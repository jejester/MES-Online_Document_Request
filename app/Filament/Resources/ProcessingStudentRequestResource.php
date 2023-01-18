<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Mail\StudentPickupMail;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\ProcessingStudentRequest;
use Filament\Forms\Components\TextInput;
use App\Models\StudentDocsReadyforPickup;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProcessingStudentRequestResource\Pages;
use App\Filament\Resources\ProcessingStudentRequestResource\RelationManagers;

class ProcessingStudentRequestResource extends Resource
{
    protected static ?string $model = ProcessingStudentRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Student Requests Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
                Card::make()->schema([
                    DateTimePicker::make('created_at')->label('Date Requested')->displayFormat('F j, Y / H:i A')->columnSpan(2)->required()->disabled(),
                    TextInput::make('first_name')->required(),
                    TextInput::make('middle_name')->required(),
                    TextInput::make('last_name')->required(),
                    TextInput::make('lrn')->required()->label('LRN'),
                    TextInput::make('email')->required(),
                    TextInput::make('contact')->required(),
                    TextInput::make('birthday')->required(),
                    TextInput::make('gender')->required(),
                ])->columns(2),
                Card::make()->schema([
                    TextInput::make('tracking_number')->required()->disabled(),
                    TextInput::make('pin')->required()->disabled(),
                ])->columns(2)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->label('Date Approved')->sortable()->date('F j, Y / h:i A'),
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('lrn')->label('LRN'),
                Tables\Columns\TextColumn::make('grade'),
                Tables\Columns\TextColumn::make('section'),
                Tables\Columns\TextColumn::make('document')->label('Document Requesting'),
                Tables\Columns\TextColumn::make('contact'),
                Tables\Columns\TextColumn::make('approved_by'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Ready For Pickup')
                ->action(function (ProcessingStudentRequest $record, array $data): void {
                    $values = array(
                        "user_id"=>$record->user_id,
                        "first_name"=>$record->first_name,
                        "middle_name"=>$record->middle_name,
                        "last_name"=>$record->last_name,
                        "gender"=>$record->gender,
                        "email"=>$record->email,
                        "grade"=>$record->grade,
                        "section"=>$record->section,
                        "contact"=>$record->contact,
                        "address"=>$record->address,
                        "lrn"=>$record->lrn,
                        "document"=>$record->document,
                        "birthday"=>$record->birthday,
                        "created_at"=>Carbon::now(),
                        "tracking_number"=>$record->tracking_number,
                        "pin"=>$record->pin,
                        "status"=>2,
                        "approved_by"=>Auth::user()->name,
                    );

                    $tr = $record->tracking_number;
                    $name = $record->first_name;
                    $p = $record->pin;

                    StudentDocsReadyforPickup::insert($values);
                    Mail::to($record->email)->send(new StudentPickupMail($tr, $name, $p));
                    DB::table('processing_student_requests')->delete($record->id);
                })
                ->requiresConfirmation()
                ->color('success'),
            ])->filters([
                SelectFilter::make('grade')
                ->options([
                    'Kinder' => 'Kinder',
                    'Grade 1' => 'Grade 1',
                    'Grade 2' => 'Grade 2',
                    'Grade 3' => 'Grade 3',
                    'Grade 4' => 'Grade 4',
                    'Grade 5' => 'Grade 5',
                    'Grade 6' => 'Grade 6',
                ])
                ->attribute('grade'),
                Filter::make('f137')
                ->query(fn (Builder $query): Builder => $query->where('document', 'Form-137'))->label('Form-137'),
                Filter::make('coe')
                ->query(fn (Builder $query): Builder => $query->where('document', 'Certificate of Enrollment'))->label('Certificate of Enrollment'),
                Filter::make('cog')
                ->query(fn (Builder $query): Builder => $query->where('document', 'Certificate of Graduation'))->label('Certificate of Graduation'),
                Filter::make('cgm')
                ->query(fn (Builder $query): Builder => $query->where('document', 'Certificate of Good Moral'))->label('Certificate of Good Moral'),
            ])
            ->bulkActions([

            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProcessingStudentRequests::route('/'),
            'create' => Pages\CreateProcessingStudentRequest::route('/create'),
            'edit' => Pages\EditProcessingStudentRequest::route('/{record}/edit'),
        ];
    }    

    public static function canCreate(): bool
    {
        return false;
    }
}
