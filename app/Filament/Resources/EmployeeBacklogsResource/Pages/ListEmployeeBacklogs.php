<?php

namespace App\Filament\Resources\EmployeeBacklogsResource\Pages;

use App\Filament\Resources\EmployeeBacklogsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeBacklogs extends ListRecords
{
    protected static string $resource = EmployeeBacklogsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
