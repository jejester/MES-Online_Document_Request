<?php

namespace App\Filament\Resources\BacklogsResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\BacklogsResource;
use App\Filament\Resources\BacklogsResource\Widgets\BacklogsOverview;

class ListBacklogs extends ListRecords
{
    protected static string $resource = BacklogsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            BacklogsOverview::class
        ];
    }
}
