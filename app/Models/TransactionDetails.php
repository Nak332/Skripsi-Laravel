<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    public function transaksi(){
        return $this->belongsTo(Transaction::class);
    }
    public function medicine(){
        return $this->belongsTo(Medicine::class,'medicine_id','id');
    }
    protected $guarded = [
    ];
    use HasFactory;
}
