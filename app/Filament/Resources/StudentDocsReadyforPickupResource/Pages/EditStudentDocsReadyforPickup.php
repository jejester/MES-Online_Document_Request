<?php

namespace App\Filament\Resources\StudentDocsReadyforPickupResource\Pages;

use App\Filament\Resources\StudentDocsReadyforPickupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentDocsReadyforPickup extends EditRecord
{
    protected static string $resource = StudentDocsReadyforPickupResource::class;

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
