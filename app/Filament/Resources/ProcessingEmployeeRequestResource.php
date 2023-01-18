<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Mail\EmployeePickupMail;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\TextInput;
use App\Models\ProcessingEmployeeRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Models\EmployeeDocsReadyforPickup;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProcessingEmployeeRequestResource\Pages;
use App\Filament\Resources\ProcessingEmployeeRequestResource\RelationManagers;

class ProcessingEmployeeRequestResource extends Resource
{
    protected static ?string $model = ProcessingEmployeeRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?int $navigationSort = 7;
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
            Tables\Columns\TextColumn::make('created_at')->label('Date Approved')->sortable()->date('F j, Y / h:i A'),
            Tables\Columns\TextColumn::make('first_name')->searchable(),
            Tables\Columns\TextColumn::make('last_name')->searchable(),
            Tables\Columns\TextColumn::make('employee_id')->label('Employee ID'),
            Tables\Columns\TextColumn::make('document')->label('Document Requesting'),
            Tables\Columns\TextColumn::make('contact'),
            Tables\Columns\TextColumn::make('approved_by'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\Action::make('Ready For Pickup')
            ->action(function (ProcessingEmployeeRequest $record, array $data): void {
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
                    "status"=>2,
                    "approved_by"=>Auth::user()->name,
                );

                $tr = $record->tracking_number;
                $name = $record->first_name;
                $p = $record->pin;

                EmployeeDocsReadyforPickup::insert($values);
                Mail::to($record->email)->send(new EmployeePickupMail($tr, $name, $p));
                DB::table('processing_employee_requests')->delete($record->id);
            })
            ->requiresConfirmation()
            ->color('success'),
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

    
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProcessingEmployeeRequests::route('/'),
            'create' => Pages\CreateProcessingEmployeeRequest::route('/create'),
            'edit' => Pages\EditProcessingEmployeeRequest::route('/{record}/edit'),
        ];
    }    

    public static function canCreate(): bool
    {
        return false;
    }
}
