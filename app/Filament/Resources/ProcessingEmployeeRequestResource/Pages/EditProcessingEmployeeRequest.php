<?php

namespace App\Filament\Resources\ProcessingEmployeeRequestResource\Pages;

use App\Filament\Resources\ProcessingEmployeeRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcessingEmployeeRequest extends EditRecord
{
    protected static string $resource = ProcessingEmployeeRequestResource::class;

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
