<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $properties = [];
        $properties['address'] = $data['address'];
        $properties['birth_date'] = $data['birth_date'];
        $data['properties'] = $properties;
        return $data;
    }
}
