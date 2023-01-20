<?php

namespace App\Filament\Resources\EmployeeBacklogsResource\Widgets;

use Carbon\Carbon;
use App\Models\EmployeeBacklogs;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EmployeeBacklogsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $users = EmployeeBacklogs::select('created_at')->get()->groupBy(function($users) {
            return Carbon::parse($users->created_at)->format('F');
        });
        $quantities = [];
        foreach ($users as $user => $value) {
            array_push($quantities, $value->count());
        }

        $month = Carbon::now()->format('F');

        $total_requests = array_sum($quantities);

        return [
            Card::make("Employee Backlogs this $month", $total_requests),
            Card::make('Total Employee Backlogs', EmployeeBacklogs::all()->count()),
        ];
    }
}
