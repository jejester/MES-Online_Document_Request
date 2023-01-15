<?php

namespace App\Filament\Resources\StudentDocsReadyforPickupResource\Pages;

use App\Filament\Resources\StudentDocsReadyforPickupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentDocsReadyforPickups extends ListRecords
{
    protected static string $resource = StudentDocsReadyforPickupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
