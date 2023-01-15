<?php

namespace App\Filament\Resources\EmployeeDocsReadyforPickupResource\Pages;

use App\Filament\Resources\EmployeeDocsReadyforPickupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeDocsReadyforPickups extends ListRecords
{
    protected static string $resource = EmployeeDocsReadyforPickupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
