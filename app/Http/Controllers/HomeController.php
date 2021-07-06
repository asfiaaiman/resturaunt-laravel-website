<?php

namespace App\Http\Controllers;

use App\Models\FoodDetail;
use App\Models\Foodtype;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $foodtypes = Foodtype::with('foods')->where('status', '1')->get();
        $foods = FoodDetail::with('foodtype')->where('status', '1')->get();
        $specials = FoodDetail::with('foodtype')
            ->where('status', '1')->get();
        return view('website.index')->with(['foodtypes' => $foodtypes, 'foods' => $foods, 'specials' => $specials]);
    }

    public function messages_store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);


        $contact = new Message();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        return redirect('/home')->with('success', 'Message  has been sent successfully.');
    }

    public function detailedMenu()
    {
        $foodtypes = Foodtype::with('foods')->where('status', '1')->get();
        return view('website.detailedMenu')->with('foodtypes', $foodtypes);
    }
}
