<?php

namespace App\Filament\Resources\ProcessingStudentRequestResource\Pages;

use App\Filament\Resources\ProcessingStudentRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcessingStudentRequests extends ListRecords
{
    protected static string $resource = ProcessingStudentRequestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
