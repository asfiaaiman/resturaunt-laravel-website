<?php

namespace App\Http\Controllers;

use App\Models\FoodDetail;
use App\Models\Foodtype;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $foodtypes = Foodtype::all(); 
        return view('website.index')->with('foodtypes', $foodtypes);
    }
}
