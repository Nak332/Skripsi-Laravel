<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentHistory extends Model
{
    public function appointments(){
        return $this->hasMany(Appointment::class,'appointment_id','id');
    }
    use HasFactory;

}
