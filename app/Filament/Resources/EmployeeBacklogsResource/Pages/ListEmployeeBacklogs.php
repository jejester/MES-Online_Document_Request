<?php

namespace App\Filament\Resources\EmployeeBacklogsResource\Pages;

use App\Filament\Resources\BacklogsResource\Widgets\BacklogsOverview;
use App\Filament\Resources\EmployeeBacklogsResource;
use App\Filament\Resources\EmployeeBacklogsResource\Widgets\EmployeeBacklogsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeBacklogs extends ListRecords
{
    protected static string $resource = EmployeeBacklogsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            EmployeeBacklogsOverview::class
        ];
    }
}
