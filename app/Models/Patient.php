<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Patient extends Model
{
    use HasFactory;

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function rekammedis(){
        return $this->hasMany(RekamMedis::class);
    }

    public function Vaksin(){
        return $this->hasMany(Vaksin::class);
    }

    public function getAge(){
        $birthday = strtotime($this->patient_DOB);
        Log::alert($birthday);
        $changeformat = date('Y-m-d', $birthday);
        $a =  Carbon::parse($changeformat);
        return $a->diff(Carbon::now()) ->format('%y years, %m months and %d days');
    }

    public function LastAppointment(){
        $p = RekamMedis::orderBy('created_at')->first();
        return $p;
    }

    protected $guarded = [
    ];
    protected $casts = [
        'patient_NIK' => 'encrypted',
    ];

}
