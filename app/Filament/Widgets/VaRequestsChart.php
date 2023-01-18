<?php

namespace App\Filament\Widgets;

use App\Models\CompletedRequests;
use App\Models\EmployeeCompletedRequests;
use App\Models\EmployeeDocsReadyforPickup;
use App\Models\EmployeeRequest;
use App\Models\ProcessingEmployeeRequest;
use App\Models\ProcessingStudentRequest;
use App\Models\StudentDocsReadyforPickup;
use App\Models\StudentRequest;
use App\Models\User;
use Illuminate\Support\Carbon;
use Filament\Widgets\BarChartWidget;

class VaRequestsChart extends BarChartWidget
{
    protected static ?string $heading = 'Requests Chart';

    

    protected function getData(): array {
        $pending_employee_req = EmployeeRequest::select('created_at')->get()->groupBy(function($pending_employee_req) {
            return Carbon::parse($pending_employee_req->created_at)->format('F');
        });

        $processing_employee_req = ProcessingEmployeeRequest::select('created_at')->get()->groupBy(function($processing_employee_req) {
            return Carbon::parse($processing_employee_req->created_at)->format('F');
        });

        $pickup_employee_req = EmployeeDocsReadyforPickup::select('created_at')->get()->groupBy(function($pickup_employee_req) {
            return Carbon::parse($pickup_employee_req->created_at)->format('F');
        });

        $employee_req = EmployeeCompletedRequests::select('created_at')->get()->groupBy(function($employee_req) {
            return Carbon::parse($employee_req->created_at)->format('F');
        });


        $pending_students_req = StudentRequest::select('created_at')->get()->groupBy(function($pending_students_req) {
            return Carbon::parse($pending_students_req->created_at)->format('F');
        });

        $processing_students_req = ProcessingStudentRequest::select('created_at')->get()->groupBy(function($processing_students_req) {
            return Carbon::parse($processing_students_req->created_at)->format('F');
        });

        $pickup_students_req = StudentDocsReadyforPickup::select('created_at')->get()->groupBy(function($pickup_students_req) {
            return Carbon::parse($pickup_students_req->created_at)->format('F');
        });

        $students_req = CompletedRequests::select('created_at')->get()->groupBy(function($students_req) {
            return Carbon::parse($students_req->created_at)->format('F');
        });

        
        $student_quantities = [];
        foreach ($students_req as $user => $value) {
            array_push($student_quantities, $value->count());
        }

        $student_quantities2 = [];
        foreach ($pending_students_req as $user => $value) {
            array_push($student_quantities2, $value->count());
        }

        $student_quantities3 = [];
        foreach ($processing_students_req as $user => $value) {
            array_push($student_quantities3, $value->count());
        }

        $student_quantities4 = [];
        foreach ($pickup_students_req as $user => $value) {
            array_push($student_quantities4, $value->count());
        }

        $employee_quantities = [];
        foreach ($employee_req as $user => $value) {
            array_push($employee_quantities, $value->count());
        }

        $employee_quantities2 = [];
        foreach ($pending_employee_req as $user => $value) {
            array_push($employee_quantities2, $value->count());
        }
        
        $employee_quantities3 = [];
        foreach ($processing_employee_req as $user => $value) {
            array_push($employee_quantities3, $value->count());
        }

        $employee_quantities4 = [];
        foreach ($pickup_employee_req as $user => $value) {
            array_push($employee_quantities4, $value->count());
        }

        $total_quantities = array_map(function () {
            return array_sum(func_get_args());
        }, $student_quantities, $student_quantities2, $student_quantities3, $student_quantities4, $employee_quantities,  $employee_quantities2,  $employee_quantities3, $employee_quantities4);
    

        return [
            'datasets' => [
                [
                    'label' => 'Total Requests Made',
                    'data' => $total_quantities,
                    'backgroundColor' => [
                        'rgba(255, 509, 64, 2)',
                        'rgba(255, 205, 86, 2)',
                        'rgba(75, 192, 192, 2)',
                        'rgba(54, 162, 235, 2)',
                        'rgba(153, 102, 255, 2)',
                        'rgba(201, 203, 207, 2)',
                        'rgba(255, 99, 132, 2)',
                    ],
                    'borderColor' => [
                        'rgb(255, 509, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(255, 99, 132)',
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => $students_req->keys(),
        ];
    }
}
