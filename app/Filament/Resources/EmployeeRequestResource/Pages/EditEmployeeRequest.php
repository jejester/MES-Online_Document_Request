<?php

namespace App\Filament\Resources\EmployeeRequestResource\Pages;

use App\Filament\Resources\EmployeeRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmployeeRequest extends EditRecord
{
    protected static string $resource = EmployeeRequestResource::class;

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
