<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MedicineDetail extends Model
{

    public function isExpired()
    {
        $expirationDate = Carbon::parse($this->medicine_expired_date);
        
        return $expirationDate->isPast();
    }

    public function Medicine(){
        return $this->belongsTo(Medicine::class);
    }
    use HasFactory;
    protected $guarded = [
    ];
}
