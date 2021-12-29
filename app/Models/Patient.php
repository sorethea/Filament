<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'birth_date',
        'gender',
        'address1',
        'address2',
        'city',
        'note',
        'active',
    ];

    protected $casts = [
    'birth_date'=>'date',
    'active'=>'boolean',
];
    protected $appends=[
      'name',
    ];
    public function getNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }
}
