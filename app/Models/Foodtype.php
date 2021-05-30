<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodtype extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function foods()
    {
        return $this->hasMany('App\FoodDetail');
    }
}
