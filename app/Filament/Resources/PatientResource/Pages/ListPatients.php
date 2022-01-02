<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\Patient;
use Closure;
use Filament\Resources\Pages\ListRecords;

class ListPatients extends ListRecords
{
    protected static string $resource = PatientResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            //PatientResource\Widgets\PatientOverview::class,
        ];
    }

//    protected function getTableRecordUrlUsing():Closure
//    {       return fn(Patient $record): string => route('filament.resources.patients.view',['record'=>$record]);
//    }
}
