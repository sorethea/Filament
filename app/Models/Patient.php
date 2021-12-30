<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'address1',
        'address2',
        'city',
        'note',
        'active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
    'birth_date'=>'date',
    'active'=>'boolean',
];
    protected $appends=[
        'name',
        'phone_number'
    ];
    public function getPhoneNumberAttribute(){
        return $this->user->phone_number;
    }
    public function getNameAttribute(){
        return $this->user->name;
    }
    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
