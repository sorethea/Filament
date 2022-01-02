<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientCase extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'code',
        'case_date',
        'status',
        'active',
        'description',
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

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
