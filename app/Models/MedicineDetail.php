<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineDetail extends Model
{
    public function Medicine(){
        return $this->belongsTo(Medicine::class);
    }
    use HasFactory;
    protected $guarded = [
    ];
}
