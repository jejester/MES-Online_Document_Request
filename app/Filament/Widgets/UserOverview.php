<?php

namespace App\Filament\Widgets;

use App\Models\CompletedRequests;
use App\Models\EmployeeCompletedRequests;
use App\Models\EmployeeDocsReadyforPickup;
use App\Models\User;
use App\Models\EmployeeRequest;
use App\Models\ProcessingEmployeeRequest;
use App\Models\ProcessingStudentRequest;
use App\Models\StudentDocsReadyforPickup;
use App\Models\StudentRequest;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $emp_req = EmployeeRequest::all()->count();
        $emp_pend = ProcessingEmployeeRequest::all()->count();
        $empforpickup = EmployeeDocsReadyforPickup::all()->count();
        $emp_total = $emp_req + $emp_pend + $empforpickup;

        $student_req = StudentRequest::all()->count();
        $student_pend = ProcessingStudentRequest::all()->count();
        $studentforpickup = StudentDocsReadyforPickup::all()->count();
        $student_total = $student_req + $student_pend + $studentforpickup;

        $total_requests = $emp_total + $student_total;
        
        $employee_completed_req = EmployeeCompletedRequests::all()->count();
        $student_completed_req = CompletedRequests::all()->count();
        $total_completed_req = $employee_completed_req + $student_completed_req;

        return [
            Card::make('Registered Users', User::all()->count()),
            Card::make('Total Requests', $total_requests),
            Card::make('Completed Requests', $total_completed_req),
        ];
    }
}
