<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\EmployeeBacklogs;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\TextInput;
use App\Models\EmployeeCompletedRequests;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeBacklogsResource\Pages;
use App\Filament\Resources\EmployeeBacklogsResource\RelationManagers;
use App\Filament\Resources\EmployeeBacklogsResource\Widgets\EmployeeBacklogsOverview;

class EmployeeBacklogsResource extends Resource
{
    protected static ?string $model = EmployeeBacklogs::class;

    protected static ?int $navigationSort = 8;
    protected static ?string $navigationIcon = 'heroicon-o-x-circle';
    protected static ?string $navigationGroup = 'Employee Logs';
    protected static ?string $navigationLabel = 'Employee Backlogs';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                DateTimePicker::make('created_at')->label('Date Claimed')->displayFormat('F j, Y / H:i A')->columnSpan(2)->required()->disabled(),
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
                Tables\Columns\TextColumn::make('created_at')->label('Date Expired')->sortable()->date('F j, Y / h:i A'),
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('employee_id')->label('Employee ID'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('document')->label('Document Requesting'),
                Tables\Columns\TextColumn::make('contact'),
            ])
            ->filters([
                Filter::make('fds')
                ->query(fn (Builder $query): Builder => $query->where('document', 'FDS'))->label('FDS'),
                Filter::make('coe')
                ->query(fn (Builder $query): Builder => $query->where('document', 'Certificate of Employment'))->label('Certificate of Employment'),
            ])
            ->actions([
                Tables\Actions\Action::make('Claimed')
                ->action(function (EmployeeBacklogs $record, array $data): void {
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
                        "released_by"=>Auth::user()->name,
                    );
    
                    EmployeeCompletedRequests::insert($values);
                    DB::table('employee_backlogs')->delete($record->id);
                })
                ->requiresConfirmation()
                ->color('success'),
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

    public static function getWidgets(): array
    {
        return [
           EmployeeBacklogsOverview::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployeeBacklogs::route('/'),
            'create' => Pages\CreateEmployeeBacklogs::route('/create'),
            'edit' => Pages\EditEmployeeBacklogs::route('/{record}/edit'),
        ];
    }    

    public static function canCreate(): bool
    {
        return false;
    }
}
