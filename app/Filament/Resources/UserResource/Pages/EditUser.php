<?php

namespace App\Filament\Resources\UserResource\Pages;

use Closure;
use Filament\Pages\Actions;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->modalHeading('Delete Request')
            ->modalSubheading('Are you sure you\'d like to delete this user?')
            ->form([
                TextInput::make('Password')
                ->password()
                ->required()
                ->rules([
                    function () {
                        return function (string $attribute, $value, Closure $fail) {
                            if ($value !== 'password') {
                                $fail("Password invalid.");
                            }
                        };
                    },
                ]),
            ]),
        ];
    }

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
