<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BacklogsResource\Pages;
use App\Models\Backlogs;

use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;


class BacklogsResource extends Resource
{
    protected static ?string $model = Backlogs::class;

    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-o-x-circle';
    protected static ?string $navigationGroup = 'Student Logs';
    protected static ?string $navigationLabel = 'Student Backlogs';

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
            'index' => Pages\ListBacklogs::route('/'),
            'create' => Pages\CreateBacklogs::route('/create'),
            'edit' => Pages\EditBacklogs::route('/{record}/edit'),
        ];
    }  
    
    public static function canCreate(): bool
    {
        return false;
    }
}
