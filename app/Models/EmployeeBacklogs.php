<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBacklogs extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'middle_name',
        'last_name',
        'employee_id',
        'document',
        'email',
        'address',
        'birthday',
        'contact',
        'gender',
        'tracking_number',
        'pin',
        'status'
    ];
}
