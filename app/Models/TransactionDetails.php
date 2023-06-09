<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    public function transaksi(){
        return $this->belongsTo(Transaction::class);
    }
    protected $guarded = [
    ];
    use HasFactory;
}
