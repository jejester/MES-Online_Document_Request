<?php

namespace App\Filament\Resources\BacklogsResource\Pages;

use App\Filament\Resources\BacklogsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBacklogs extends EditRecord
{
    protected static string $resource = BacklogsResource::class;

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
