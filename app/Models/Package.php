<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'name',
        'discount',
        'total_amount',
        'description',
        'active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'active'=>'boolean',
    ];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    public function services(){
        return $this->belongsToMany(Service::class,'package_items');
    }

    public function items(){
        return $this->hasMany(PackageItem::class,'package_id','id');
    }

}
