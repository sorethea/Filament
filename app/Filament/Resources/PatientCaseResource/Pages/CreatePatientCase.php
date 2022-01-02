<?php

namespace App\Filament\Resources\PatientCaseResource\Pages;

use App\Filament\Resources\PatientCaseResource;
use App\Models\Patient;
use Filament\Resources\Pages\CreateRecord;

class CreatePatientCase extends CreateRecord
{
    protected static string $resource = PatientCaseResource::class;
    public $record;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        $data['code']=\Str::random(16);
        return $data;
    }
}
