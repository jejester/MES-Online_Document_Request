<?php

namespace App\Filament\Resources\EmployeeCompletedRequestsResource\Pages;

use App\Filament\Resources\EmployeeCompletedRequestsResource;
use App\Filament\Resources\EmployeeCompletedRequestsResource\Widgets\EmployeeCompletedRequestsOverview;
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

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderWidgets(): array
    {
        return [
           EmployeeCompletedRequestsOverview::class
        ];
    }
}
