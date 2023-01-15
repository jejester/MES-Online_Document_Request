<?php

namespace App\Filament\Resources\EmployeeDocsReadyforPickupResource\Pages;

use App\Filament\Resources\EmployeeDocsReadyforPickupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmployeeDocsReadyforPickup extends EditRecord
{
    protected static string $resource = EmployeeDocsReadyforPickupResource::class;

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
