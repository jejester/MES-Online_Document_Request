<?php

namespace App\Filament\Resources\BacklogsResource\Pages;

use App\Filament\Resources\BacklogsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBacklogs extends ListRecords
{
    protected static string $resource = BacklogsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
