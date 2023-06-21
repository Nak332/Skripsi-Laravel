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
    protected $guarded = [
    ];

    use HasFactory;
}
