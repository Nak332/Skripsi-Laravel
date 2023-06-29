<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function Medicine(){
        return $this->hasMany(Medicine::class);
    }
    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
    public function Patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    public function Employees(){
        return $this->belongsTo(Employees::class,'employee_id','id');
    }
    use HasFactory;
}
