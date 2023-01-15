<?php

namespace App\Filament\Resources\StudentRequestResource\Pages;

use App\Filament\Resources\StudentRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentRequest extends EditRecord
{
    protected static string $resource = StudentRequestResource::class;

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
