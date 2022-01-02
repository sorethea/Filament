<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();
        $user = User::create(['phone_number' => $data['phone_number'], 'name' => $data['name'], 'password' => \Hash::make($data['password']),]);
        $user->assignRole('Patient');
        $data['user_id'] = $user->id;
        return $data;
    }
}
