<?php

namespace App\Filament\Resources\BacklogsResource\Widgets;

use Carbon\Carbon;
use App\Models\Backlogs;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class BacklogsOverview extends BaseWidget
{
    protected function getCards(): array
    {

        $users = Backlogs::select('created_at')->get()->groupBy(function($users) {
            return Carbon::parse($users->created_at)->format('F');
        });
        $quantities = [];
        foreach ($users as $user => $value) {
            array_push($quantities, $value->count());
        }

        $month = Carbon::now()->format('F');

        $total_backlogs = array_sum($quantities);

        return [
            Card::make("Student Backlogs this $month", $total_backlogs),
            Card::make('Total Student Backlogs', Backlogs::all()->count()),
        ];
    }
}
