<?php

namespace App\Filament\Resources\EmployeeCompletedRequestsResource\Pages;

use App\Filament\Resources\EmployeeCompletedRequestsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployeeCompletedRequests extends CreateRecord
{
    protected static string $resource = EmployeeCompletedRequestsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
