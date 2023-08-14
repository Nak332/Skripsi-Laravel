<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function transaksi(){
        return $this->hasMany(TransactionDetails::class);
    }
    public function Patient(){
        return $this->belongsTo(Patient::class);
    }
    public function rekammedis(){
        return $this->belongsTo(RekamMedis::class, 'rekamMedis_id', 'id');
    }
    public function employee(){
        return $this->belongsTo(Employees::class, 'employee_id', 'id');
    }
    protected $guarded = [
    ];

    use HasFactory;
}
