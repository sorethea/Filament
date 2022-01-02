<?php

namespace App\Filament\Resources\PackageResource\Pages;

use App\Filament\Resources\PackageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePackage extends CreateRecord
{
    protected static string $resource = PackageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by']=auth()->id()??null;
        $total = 0;
        $discount = $data['discount'];
        foreach ($data['items'] as $item){
            $total +=$item['unit_price'] * $item['quantity'];
        }
        $data['total_amount'] = $total - ($total * $discount/100);

        return $data;
    }
}
