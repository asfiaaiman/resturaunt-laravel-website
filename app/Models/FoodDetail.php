<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDetail extends Model
{
    use HasFactory;
    public function foodtype() {
        return $this->belongsTo(Foodtype::class,'foodtype_id');
    }
}
