<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{

    protected $guarded = [];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
    use HasFactory;

    // public function decryptEmp()
    // {
    //     return decrypt($this->attributes['employee_NIK']);
    // }


    protected $casts = [
        'employee_NIK' => 'encrypted',
    ];
}
