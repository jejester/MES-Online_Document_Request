<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\StudentRequest;
use App\Models\EmployeeRequest;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\PieChartWidget;

class VsRequestsChart extends PieChartWidget
{
    protected static ?string $heading = 'Requested Employee Documents this Month';

    protected function getData(): array {


        $coe = DB::table('employee_completed_requests')->where('document', 'Certificate of Employment')->get()->groupBy(function($coe) {
            return Carbon::parse($coe->created_at)->format('F');
        });

        $fds = DB::table('employee_completed_requests')->where('document', 'FDS')->get()->groupBy(function($fds) {
            return Carbon::parse($fds->created_at)->format('F');
        });
       

        
        $fds_quantities = [];
        foreach ($fds as $user => $value) {
            array_push($fds_quantities, $value->count());
        }

        
        $coe_quantities = [];
        foreach ($coe as $user => $value) {
            array_push($coe_quantities, $value->count());
        }



        return [
            'datasets' => [
                [
                    'label' => 'Requests Made',
                    'data' => [$fds_quantities, $coe_quantities],
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 5)',
                        'rgba(255, 159, 64, 5)',
                    ],
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 164)',
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => ['FDS', 'Certificate of Employment'],
        ];
    }
}
