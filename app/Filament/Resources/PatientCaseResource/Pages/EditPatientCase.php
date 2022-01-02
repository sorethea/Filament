<?php

namespace App\Filament\Resources\PatientCaseResource\Pages;

use App\Filament\Resources\PatientCaseResource;
use Filament\Resources\Pages\EditRecord;

class EditPatientCase extends EditRecord
{
    protected static string $resource = PatientCaseResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = auth()->id();
        return $data;
    }
}
