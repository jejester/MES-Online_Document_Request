<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Tables;

use App\Models\Backlogs;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\CompletedRequests;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\BacklogsResource\Pages;
use App\Filament\Resources\BacklogsResource\Widgets\BacklogsOverview;

class BacklogsResource extends Resource
{
    protected static ?string $model = Backlogs::class;

    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-o-x-circle';
    protected static ?string $navigationGroup = 'Student Logs';
    protected static ?string $navigationLabel = 'Student Backlogs';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
                Card::make()->schema([
                    DateTimePicker::make('created_at')->label('Date Expired')->displayFormat('F j, Y / H:i A')->columnSpan(2)->required()->disabled(),
                    TextInput::make('first_name')->required(),
                    TextInput::make('middle_name')->required(),
                    TextInput::make('last_name')->required(),
                    TextInput::make('lrn')->required()->label('LRN'),
                    TextInput::make('grade')->required()->label('Grade'),
                    TextInput::make('section')->required()->label('Section'),
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
                Tables\Columns\TextColumn::make('created_at')->label('Date Expired')->sortable()->date('F j, Y / h:i A'),
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('lrn')->label('LRN'),
                Tables\Columns\TextColumn::make('grade')->label('Grade'),
                Tables\Columns\TextColumn::make('section')->label('Section'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('document')->label('Document Requesting'),
                Tables\Columns\TextColumn::make('contact'),
            ])
            ->filters([
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
            ->actions([
                Tables\Actions\Action::make('Claimed')
                ->action(function (Backlogs $record, array $data): void {
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
                        "released_by"=>Auth::user()->name,
                    );
    
                    CompletedRequests::insert($values);
                    DB::table('backlogs')->delete($record->id);
                })
                ->requiresConfirmation()
                ->color('success'),
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

    public static function getWidgets(): array
    {
        return [
           BacklogsOverview::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBacklogs::route('/'),
            'create' => Pages\CreateBacklogs::route('/create'),
            'edit' => Pages\EditBacklogs::route('/{record}/edit'),
        ];
    }  
    
    public static function canCreate(): bool
    {
        return false;
    }
}
