<?php

namespace App\Filament\Resources\EmployeeCompletedRequestsResource\Widgets;

use Carbon\Carbon;
use App\Models\EmployeeCompletedRequests;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EmployeeCompletedRequestsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $users = EmployeeCompletedRequests::select('created_at')->get()->groupBy(function($users) {
            return Carbon::parse($users->created_at)->format('F');
        });
        $quantities = [];
        foreach ($users as $user => $value) {
            array_push($quantities, $value->count());
        }

        $month = Carbon::now()->format('F');

        $total_requests = array_sum($quantities);

        return [
            Card::make("Completed Employee Requests this $month", $total_requests),
            Card::make('Total Completed Employee Requests', EmployeeCompletedRequests::all()->count()),
        ];
    }
}
