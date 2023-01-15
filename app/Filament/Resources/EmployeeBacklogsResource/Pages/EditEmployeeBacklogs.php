<?php

namespace App\Filament\Resources\EmployeeBacklogsResource\Pages;

use App\Filament\Resources\EmployeeBacklogsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmployeeBacklogs extends EditRecord
{
    protected static string $resource = EmployeeBacklogsResource::class;

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
