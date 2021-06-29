<?php

namespace App\Http\Controllers;

use App\Models\FoodDetail;
use App\Models\Foodtype;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $foodtypes = Foodtype::with('foods')->where('status', '1')->get();
        $foods = FoodDetail::with('foodtype')->where('status', '1')->get();
        $specials = FoodDetail::with('foodtype')
                   ->where('status', '1')->get();
        return view('website.index')->with(['foodtypes' => $foodtypes, 'foods' => $foods, 'specials' => $specials]);
    }
}
