<?php

namespace App\Filament\Resources\StudentRequestResource\Pages;

use Carbon\Carbon;
use Filament\Pages\Actions;
use App\Models\StudentRequest;
use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProcessingStudentRequest;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\StudentRequestResource;

class EditStudentRequest extends EditRecord
{
    protected static string $resource = StudentRequestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


}
