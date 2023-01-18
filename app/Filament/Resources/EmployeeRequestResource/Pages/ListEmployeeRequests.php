<?php

namespace App\Filament\Resources\EmployeeRequestResource\Pages;

use App\Filament\Resources\EmployeeRequestResource;
use App\Filament\Resources\EmployeeRequestResource\Widgets\EmployeeRequestOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeRequests extends ListRecords
{
    protected static string $resource = EmployeeRequestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            EmployeeRequestOverview::class
        ];
    }
}
