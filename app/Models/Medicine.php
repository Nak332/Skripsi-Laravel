<?php

namespace App\Models;

use App\Models\MedicineDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public static function stock($medicineId)
    {
        $currentDate = Carbon::now();
        return MedicineDetail::where('medicine_id', $medicineId)->where('medicine_expired_date', '>', $currentDate)->sum('medicine_stock');
    }
}
