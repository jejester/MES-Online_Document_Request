<?php

namespace App\Filament\Resources\StudentRequestResource\Pages;

use App\Filament\Resources\StudentRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudentRequest extends CreateRecord
{
    protected static string $resource = StudentRequestResource::class;
}
