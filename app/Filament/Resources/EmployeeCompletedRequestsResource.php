<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\TextInput;
use App\Models\EmployeeCompletedRequests;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeCompletedRequestsResource\Pages;
use App\Filament\Resources\EmployeeCompletedRequestsResource\RelationManagers;
use App\Filament\Resources\EmployeeCompletedRequestsResource\Widgets\EmployeeCompletedRequestsOverview;

class EmployeeCompletedRequestsResource extends Resource
{
    protected static ?string $model = EmployeeCompletedRequests::class;

    protected static ?int $navigationSort = 9;
    protected static ?string $navigationIcon = 'heroicon-o-check-circle';
    protected static ?string $navigationGroup = 'Employee Logs';
    protected static ?string $navigationLabel = 'Employee Completed Requests';

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
                Tables\Columns\TextColumn::make('created_at')->label('Date Claimed')->sortable()->date('F j, Y / h:i A'),
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('employee_id')->label('Employee ID'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('document')->label('Document Requesting'),
                Tables\Columns\TextColumn::make('contact'),
                Tables\Columns\TextColumn::make('released_by'),
            ])
            ->filters([
                Filter::make('fds')
                ->query(fn (Builder $query): Builder => $query->where('document', 'FDS'))->label('FDS'),
                Filter::make('coe')
                ->query(fn (Builder $query): Builder => $query->where('document', 'Certificate of Employment'))->label('Certificate of Employment'),
            ])
            ->actions([
         
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
           EmployeeCompletedRequestsOverview::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployeeCompletedRequests::route('/'),
            'create' => Pages\CreateEmployeeCompletedRequests::route('/create'),
            'edit' => Pages\EditEmployeeCompletedRequests::route('/{record}/edit'),
        ];
    }    

    public static function canCreate(): bool
    {
        return false;
    }
}
