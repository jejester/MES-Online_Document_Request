<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Illuminate\Support\Carbon;
use Filament\Widgets\BarChartWidget;

class UsersChart extends BarChartWidget
{
    protected static ?string $heading = 'Users Chart';

    protected function getData(): array {
        $users = User::select('created_at')->get()->groupBy(function($users) {
            return Carbon::parse($users->created_at)->format('F');
        });
        $quantities = [];
        foreach ($users as $user => $value) {
            array_push($quantities, $value->count());
        }
        return [
            'datasets' => [
                [
                    'label' => 'Users Joined',
                    'data' => $quantities,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 2)',
                        'rgba(255, 159, 64, 2)',
                        'rgba(255, 205, 86, 2)',
                        'rgba(75, 192, 192, 2)',
                        'rgba(54, 162, 235, 2)',
                        'rgba(153, 102, 255, 2)',
                        'rgba(201, 203, 207, 2)'
                    ],
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => $users->keys(),
        ];
    }
    
}
