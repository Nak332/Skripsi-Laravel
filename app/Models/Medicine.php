<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    public function RekamMedis(){
        return $this->belongsTo(RekamMedis::class);
    }
    public function Detail(){
        return $this->hasMany(MedicineDetail::class);
    }
    public function Detil(){
        return $this->hasMany(TransactionDetails::class);
    }
    use HasFactory;
    protected $guarded = [
    ];
}
