<?php

namespace App\Filament\Resources\ProcessingStudentRequestResource\Pages;

use App\Filament\Resources\ProcessingStudentRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcessingStudentRequest extends EditRecord
{
    protected static string $resource = ProcessingStudentRequestResource::class;

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
