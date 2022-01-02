<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if($this->record->hasRole('Patient')){
            $this->record->patient()->update(['name'=>$data['name']]);
        }
        if($this->record->hasRole('Doctor')){
            $this->record->doctor()->update(['name'=>$data['name']]);
        }
        return $data;
    }
}
