<?php

namespace App\Filament\Resources\PatientResource\RelationManagers;

use App\Filament\Resources\PatientCaseResource;
use App\Models\PatientCase;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class CasesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'cases';

    protected static ?string $recordTitleAttribute = 'description';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(PatientCaseResource::getFormSchema())->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(PatientCaseResource::getTableColumns())
            ->filters([
                //
            ]);
    }
}
