<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeBacklogsResource\Pages;
use App\Filament\Resources\EmployeeBacklogsResource\RelationManagers;
use App\Models\EmployeeBacklogs;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Tables\Columns\TextColumn::make('created_at')->label('Date Approved')->sortable()->date('F j, Y / h:i A'),
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('employee_id')->label('Employee ID'),
                Tables\Columns\TextColumn::make('document')->label('Document Requesting'),
                Tables\Columns\TextColumn::make('contact'),
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
            ])
            ->filters([
                //
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployeeBacklogs::route('/'),
            'create' => Pages\CreateEmployeeBacklogs::route('/create'),
            'edit' => Pages\EditEmployeeBacklogs::route('/{record}/edit'),
        ];
    }    
}
