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
use Filament\Forms\Components\TextInput;
use App\Models\EmployeeCompletedRequests;
use Illuminate\Database\Eloquent\Builder;
use App\Models\EmployeeDocsReadyforPickup;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeDocsReadyforPickupResource\Pages;
use App\Filament\Resources\EmployeeDocsReadyforPickupResource\RelationManagers;

class EmployeeDocsReadyforPickupResource extends Resource
{
    protected static ?string $model = EmployeeDocsReadyforPickup::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationGroup = 'Employee Requests Management';
    protected static ?string $navigationLabel = 'Ready For Pickup';

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
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\Action::make('Claimed')
            ->action(function (EmployeeDocsReadyforPickup $record, array $data): void {
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
                );

                EmployeeCompletedRequests::insert($values);
                DB::table('employee_docs_readyfor_pickups')->delete($record->id);
            })
            ->requiresConfirmation()
            ->color('success'),


            Tables\Actions\Action::make('Unclaimed')
            ->action(function (EmployeeDocsReadyforPickup $record, array $data): void {
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
                );

                EmployeeBacklogs::insert($values);
                DB::table('student_docs_readyfor_pickups')->delete($record->id);
            })
            ->requiresConfirmation()
            ->color('danger'),
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
            'index' => Pages\ListEmployeeDocsReadyforPickups::route('/'),
            'create' => Pages\CreateEmployeeDocsReadyforPickup::route('/create'),
            'edit' => Pages\EditEmployeeDocsReadyforPickup::route('/{record}/edit'),
        ];
    }  
    
    public static function canCreate(): bool
    {
        return false;
    }
}
