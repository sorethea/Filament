<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Resources\Pages\EditRecord;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by']=auth()->id()??null;
        return $data;
    }
}
