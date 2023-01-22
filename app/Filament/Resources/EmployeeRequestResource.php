<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\EmployeeRequest;
use Filament\Resources\Resource;
use App\Mail\RequestDeclinedMail;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\TextInput;
use App\Models\ProcessingEmployeeRequest;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\EmployeeRequestResource\Pages;
use App\Filament\Resources\EmployeeRequestResource\Widgets\EmployeeRequestOverview;

class EmployeeRequestResource extends Resource
{
    protected static ?string $model = EmployeeRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationGroup = 'Employee Requests Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                DateTimePicker::make('created_at')->label('Date Requested')->displayFormat('F j, Y / H:i A')->columnSpan(2)->required()->disabled(),
                TextInput::make('first_name')->required(),
                TextInput::make('middle_name')->required(),
                TextInput::make('last_name')->required(),
                TextInput::make('employee_id')->required()->label('Employee ID'),
                TextInput::make('email')->required(),
                TextInput::make('contact')->required(),
                TextInput::make('birthday')->required(),
                TextInput::make('gender')->required(),
            ])->columns(2),
            Card::make()->schema([
                TextInput::make('tracking_number')->required()->disabled(),
                TextInput::make('pin')->required()->disabled(),
            ])->columns(2)
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->label('Date Requested')->sortable()->date('F j, Y / h:i A'),
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('employee_id')->label('Employee ID'),
                Tables\Columns\TextColumn::make('document')->label('Document Requesting'),
                Tables\Columns\TextColumn::make('contact'),
            ])
            ->actions([
                Tables\Actions\Action::make('Approve')
                ->action(function (EmployeeRequest $record, array $data): void {
                    $values = array(
                        "user_id"=>$record->user_id,
                        "first_name"=>$record->first_name,
                        "middle_name"=>$record->middle_name,
                        "last_name"=>$record->last_name,
                        "gender"=>$record->gender,
                        "email"=>$record->email,
                        "contact"=>$record->contact,
                        "address"=>$record->address,
                        "employee_id"=>$record->employee_id,
                        "document"=>$record->document,
                        "birthday"=>$record->birthday,
                        "created_at"=>Carbon::now(),
                        "tracking_number"=>$record->tracking_number,
                        "pin"=>$record->pin,
                        "status"=>1,
                        "approved_by"=>Auth::user()->name,
                    );
                    ProcessingEmployeeRequest::insert($values);
                    DB::table('employee_requests')->delete($record->id);
                })
                ->requiresConfirmation()
                ->color('success'),

                Tables\Actions\Action::make('Decline')
                ->action(function (EmployeeRequest $record): void {
                    $name = $record->first_name;
                    Mail::to($record->email)->send(new RequestDeclinedMail($name));
                    DB::table('employee_requests')->delete($record->id);
                })
                ->requiresConfirmation()
                ->color('danger'),
            ])->filters([
                Filter::make('fds')
                ->query(fn (Builder $query): Builder => $query->where('document', 'FDS'))->label('FDS'),
                Filter::make('coe')
                ->query(fn (Builder $query): Builder => $query->where('document', 'Certificate of Employment'))->label('Certificate of Employment'),
            ])
            ->bulkActions([
                
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getWidgets(): array
    {
        return [
           EmployeeRequestOverview::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployeeRequests::route('/'),
            'create' => Pages\CreateEmployeeRequest::route('/create'),
            'edit' => Pages\EditEmployeeRequest::route('/{record}/edit'),
        ];
    }   
    
    public static function canCreate(): bool
    {
        return false;
    }
}
