<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use App\Models\Doctor;
use App\Models\User;
use Filament\Resources\Pages\EditRecord;

class EditDoctor extends EditRecord
{
    protected static string $resource = DoctorResource::class;
    public $record;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = auth()->id();
        $this->record->user->update(['phone_number' => $data['phone_number'], 'name' => $data['name'] ]);
        return $data;
    }
}
