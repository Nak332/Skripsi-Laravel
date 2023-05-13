<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    public function patient(){
        return $this->belongsTo(Patient::class);
        return $this->belongsTo(Employees::class);
        return $this->belongsTo(RekamMedis::class);
    }
}
