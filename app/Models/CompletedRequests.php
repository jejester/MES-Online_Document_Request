<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedRequests extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'middle_name',
        'last_name',
        'lrn',
        'email',
        'address',
        'birthday',
        'contact',
        'gender',
        'document',
        'tracking_number',
        'pin',
        'status',
        'released_by'
    ];
}
