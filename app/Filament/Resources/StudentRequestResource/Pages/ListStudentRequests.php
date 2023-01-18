<?php

namespace App\Filament\Resources\StudentRequestResource\Pages;

use App\Filament\Resources\StudentRequestResource;
use App\Filament\Resources\StudentRequestResource\Widgets\StudentRequestOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentRequests extends ListRecords
{
    protected static string $resource = StudentRequestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StudentRequestOverview::class
        ];
    }
}
