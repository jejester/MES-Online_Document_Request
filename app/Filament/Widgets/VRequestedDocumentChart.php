<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\StudentRequest;
use App\Models\EmployeeRequest;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\PieChartWidget;

class VRequestedDocumentChart extends PieChartWidget
{
    protected static ?string $heading = 'Requested Student Documents this Month';

    protected function getData(): array {
    

        $form137 = DB::table('completed_requests')->where('document', 'Form-137')->get()->groupBy(function($form137) {
            return Carbon::parse($form137->created_at)->format('F');
        });

        $coe = DB::table('completed_requests')->where('document', 'Certificate of Enrollment')->get()->groupBy(function($coe) {
            return Carbon::parse($coe->created_at)->format('F');
        });

        $cog = DB::table('completed_requests')->where('document', 'Certificate of Graduation')->get()->groupBy(function($cog) {
            return Carbon::parse($cog->created_at)->format('F');
        });

        $cgm = DB::table('completed_requests')->where('document', 'Certificate of Good Moral')->get()->groupBy(function($cgm) {
            return Carbon::parse($cgm->created_at)->format('F');
        });
       

        
        $form137_quantities = [];
        foreach ($form137 as $user => $value) {
            array_push($form137_quantities, $value->count());
        }

        
        $coe_quantities = [];
        foreach ($coe as $user => $value) {
            array_push($coe_quantities, $value->count());
        }

        $cog_quantities = [];
        foreach ($cog as $user => $value) {
            array_push($cog_quantities, $value->count());
        }
        
        $cgm_quantities = [];
        foreach ($cgm as $user => $value) {
            array_push($cgm_quantities, $value->count());
        }
    

        return [
            'datasets' => [
                [
                    'label' => 'Requests Made',
                    'data' => [$form137_quantities, $coe_quantities, $cog_quantities,  $cgm_quantities],
                    'backgroundColor' => [
                        'rgba(75, 192, 192, 2)',
                        'rgba(54, 162, 235, 2)',
                        'rgba(153, 102, 255, 2)',
                        'rgba(201, 203, 207, 2)'
                    ],
                    'borderColor' => [
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => ['Form-137', 'Certificate of Enrollment', 'Certificate of Graduation', 'Certificate of Good Moral'],
        ];
    }
}
