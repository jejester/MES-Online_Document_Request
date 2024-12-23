<?php

namespace App\Filament\Resources\StudentRequestResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\StudentRequestResource;
use App\Filament\Resources\StudentRequestResource\Widgets\StudentRequestOverview;

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
