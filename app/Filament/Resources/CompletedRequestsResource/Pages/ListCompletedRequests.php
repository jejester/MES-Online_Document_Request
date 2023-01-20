<?php

namespace App\Filament\Resources\CompletedRequestsResource\Pages;

use App\Filament\Resources\CompletedRequestsResource;
use App\Filament\Resources\CompletedRequestsResource\Widgets\CompletedRequestsOverview;
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

    protected function getHeaderWidgets(): array
    {
        return [
            CompletedRequestsOverview::class
        ];
    }
}
