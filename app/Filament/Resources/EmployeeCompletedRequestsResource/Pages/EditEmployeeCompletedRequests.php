<?php

namespace App\Filament\Resources\EmployeeCompletedRequestsResource\Pages;

use App\Filament\Resources\EmployeeCompletedRequestsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmployeeCompletedRequests extends EditRecord
{
    protected static string $resource = EmployeeCompletedRequestsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
