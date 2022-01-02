<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Resources\Pages\ViewRecord;

class ViewPatient extends ViewRecord
{
    protected static string $resource = PatientResource::class;
    public $record;

    protected function getHeaderWidgets(): array
    {
        return [
            PatientResource\Widgets\PatientOverview::class,
        ];
    }
}
