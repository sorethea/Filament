<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Resources\Pages\EditRecord;

class EditPatient extends EditRecord
{
    protected static string $resource = PatientResource::class;
    public $record;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = auth()->id();
        $this->record->user->update(['phone_number' => $data['phone_number'], 'name' => $data['name']]);
        return $data;
    }

}
