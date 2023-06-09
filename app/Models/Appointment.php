<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function employees(){
        return $this->belongsTo(Employees::class);
    }
    public function rekammedis(){
        return $this->belongsTo(RekamMedis::class);
    }
    public function history(){
        return $this->belongsTo(AppointmentHistory::class);
    }

    protected $guarded = [
    ];

}
