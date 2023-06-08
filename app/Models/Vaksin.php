<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksin extends Model
{
    public function Patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    use HasFactory;
}
