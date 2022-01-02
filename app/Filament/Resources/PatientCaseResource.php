<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientCaseResource\Pages;
use App\Filament\Resources\PatientCaseResource\RelationManagers;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PatientCase;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Features\Placeholder;

class PatientCaseResource extends Resource
{
    protected static ?string $model = PatientCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-menu';
    protected static ?string $navigationGroup = 'Clinic';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::getFormSchema())->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(static::getTableColumns())
            ->filters([
                //
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
            'index' => Pages\ListPatientCases::route('/'),
            'create' => Pages\CreatePatientCase::route('/create'),
            'edit' => Pages\EditPatientCase::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema()
    {
        return [
            Forms\Components\Group::make()->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\BelongsToSelect::make('patient')->relationship('patient','name')->searchable(),
                    Forms\Components\BelongsToSelect::make('doctor')->relationship('doctor','name')->searchable(),
                    Forms\Components\DatePicker::make('case_date')
                        ->required(),
                    Forms\Components\Toggle::make('active')
                        ->required()->default(true),
                    Forms\Components\MarkdownEditor::make('description')
                        ->columnSpan(2),
                ]) ,
            ])->columns(['ms'=>2])->columnSpan(2),
            Forms\Components\Group::make()->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Placeholder::make('patient_name')
                        ->content(fn(?PatientCase $record): string => isset($record->patient)?$record->patient->name:'-'),
                    Forms\Components\Placeholder::make('phone_number')
                        ->content(fn(?PatientCase $record): string => isset($record->patient)?$record->patient->phone_number:'-'),
                ]),
                Forms\Components\Card::make()->schema([
                    Forms\Components\Placeholder::make('code')
                        ->content(fn(?PatientCase $record): string => $record ? $record->code : '-'),
                    Forms\Components\Placeholder::make('createdBy')
                        ->content(fn(?PatientCase $record): string => isset($record->createdBy) ? $record->createdBy->name : '-'),
                    Forms\Components\Placeholder::make('created_at')
                        ->content(fn (?PatientCase $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                    Forms\Components\Placeholder::make('updatedBy')
                        ->content(fn(?PatientCase $record): string => isset($record->updatedBy) ? $record->updatedBy->name : '-'),
                    Forms\Components\Placeholder::make('updated_at')
                        ->content(fn (?PatientCase $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                ]) ,
            ])->columnSpan(1),

        ];
    }

    public static function getTableColumns()
    {
        return [
            Tables\Columns\TextColumn::make('code'),
            Tables\Columns\TextColumn::make('patient.name'),
            Tables\Columns\TextColumn::make('doctor.name'),
            Tables\Columns\TextColumn::make('case_date')
                ->date(),
            Tables\Columns\TextColumn::make('status'),
            Tables\Columns\BooleanColumn::make('active')
        ];
    }
}
