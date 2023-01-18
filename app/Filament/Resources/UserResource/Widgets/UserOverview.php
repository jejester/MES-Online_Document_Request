<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $admin = DB::table('users')->where('is_admin', '1')->count();
        $requestors = DB::table('users')->where('is_admin', '0')->count();

        return [
            Card::make('All Users', User::all()->count()),
            Card::make('Admins', $admin),
            Card::make('Requestors', $requestors),
        ];
    }
}
