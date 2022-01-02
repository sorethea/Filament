<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Boolean;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'id',
      'name',
      'unit_price',
      'procedure',
      'active',
      'created_by',
      'updated_by',
    ];

    protected $casts = [
        'active'=>'boolean',
        'procedure'=>'json'
    ];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    public function packages(){
        return $this->belongsToMany(Package::class,'package_items');
    }
}
