<?php

namespace App\Filament\Resources\UserResource\Pages;


use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        
        return array_merge($data, [
            'email_verified_at' => now()
        ]);
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}


