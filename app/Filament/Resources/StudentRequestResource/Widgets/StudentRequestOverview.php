<?php

namespace App\Filament\Resources\StudentRequestResource\Widgets;

use App\Models\ProcessingStudentRequest;
use App\Models\StudentDocsReadyforPickup;
use App\Models\StudentRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StudentRequestOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Pending Student Requests', StudentRequest::all()->count()),
            Card::make('On Process', ProcessingStudentRequest::all()->count()),
            Card::make('Ready for Pickup', StudentDocsReadyforPickup::all()->count()),
        ];
    }
}
