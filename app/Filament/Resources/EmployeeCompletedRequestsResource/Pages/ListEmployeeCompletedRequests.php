<?php

namespace App\Filament\Resources\EmployeeCompletedRequestsResource\Pages;

use App\Filament\Resources\EmployeeCompletedRequestsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeCompletedRequests extends ListRecords
{
    protected static string $resource = EmployeeCompletedRequestsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
