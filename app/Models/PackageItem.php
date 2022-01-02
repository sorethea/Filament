<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_id',
        'service_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function package(){
        return $this->belongsTo(Package::class);
    }
}
