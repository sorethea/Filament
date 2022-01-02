<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Validator;

class CreateDoctor extends CreateRecord
{
    protected static string $resource = DoctorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();
        $user = User::create(['phone_number' => $data['phone_number'], 'name' => $data['name'] , 'password' => \Hash::make($data['password']),]);
        $user->assignRole('Doctor');
        $data['user_id'] = $user->id;
        return $data;
    }
}
