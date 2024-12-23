<?php

namespace App\Filament\Resources\EmployeeDocsReadyforPickupResource\Pages;

use Closure;
use Filament\Pages\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\EmployeeDocsReadyforPickupResource;

class EditEmployeeDocsReadyforPickup extends EditRecord
{
    protected static string $resource = EmployeeDocsReadyforPickupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->modalHeading('Delete Request')
            ->modalSubheading('Are you sure you\'d like to delete this request? This cannot be undone.')
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
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
