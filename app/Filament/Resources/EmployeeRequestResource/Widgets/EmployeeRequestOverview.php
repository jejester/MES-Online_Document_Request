<?php

namespace App\Filament\Resources\EmployeeRequestResource\Widgets;

use App\Models\EmployeeDocsReadyforPickup;
use App\Models\EmployeeRequest;
use App\Models\ProcessingEmployeeRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeRequestOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Pending Employee Requests', EmployeeRequest::all()->count()),
            Card::make('On Process', ProcessingEmployeeRequest::all()->count()),
            Card::make('Ready for Pickup', EmployeeDocsReadyforPickup::all()->count()),
        ];
    }
}
