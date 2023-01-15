<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompletedRequestsResource\Pages;
use App\Filament\Resources\CompletedRequestsResource\RelationManagers;
use App\Models\CompletedRequests;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompletedRequestsResource extends Resource
{
    protected static ?string $model = CompletedRequests::class;

    protected static ?int $navigationSort = 5;
    protected static ?string $navigationIcon = 'heroicon-o-check-circle';
    protected static ?string $navigationGroup = 'Student Logs';
    protected static ?string $navigationLabel = 'Student Completed Requests';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tables\Columns\TextColumn::make('created_at')->label('Date Approved')->sortable()->date('F j, Y / h:i A'),
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('lrn')->label('LRN'),
                Tables\Columns\TextColumn::make('grade'),
                Tables\Columns\TextColumn::make('section'),
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
                Tables\Columns\TextColumn::make('lrn')->label('LRN'),
                Tables\Columns\TextColumn::make('grade')->label('Grade'),
                Tables\Columns\TextColumn::make('section')->label('Grade'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('document')->label('Document Requesting'),
                Tables\Columns\TextColumn::make('contact'),
                Tables\Columns\TextColumn::make('released_by'),
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
            'index' => Pages\ListCompletedRequests::route('/'),
            'create' => Pages\CreateCompletedRequests::route('/create'),
            'edit' => Pages\EditCompletedRequests::route('/{record}/edit'),
        ];
    }    

    public static function canCreate(): bool
    {
        return false;
    }
}
