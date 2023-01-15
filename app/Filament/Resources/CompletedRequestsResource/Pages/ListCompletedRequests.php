<?php

namespace App\Filament\Resources\CompletedRequestsResource\Pages;

use App\Filament\Resources\CompletedRequestsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompletedRequests extends ListRecords
{
    protected static string $resource = CompletedRequestsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
