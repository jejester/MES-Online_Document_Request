<?php

namespace App\Filament\Resources\ProcessingEmployeeRequestResource\Pages;

use App\Filament\Resources\ProcessingEmployeeRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcessingEmployeeRequests extends ListRecords
{
    protected static string $resource = ProcessingEmployeeRequestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
