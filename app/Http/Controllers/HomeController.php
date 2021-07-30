<?php

namespace App\Http\Controllers;

use App\Models\FoodDetail;
use App\Models\Foodtype;
use App\Models\Message;
use App\Models\Order;
use Illuminate\Http\Request;
use DB;

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

    public function dashboard() {

        $order =  Order::select(\DB::raw("COUNT(*) as count"))
               ->whereMonth('created_at', '=', date('m'))->count();  
        $message =  Message::select(\DB::raw("COUNT(*) as count"))
               ->whereMonth('created_at', '=', date('m'))->count(); 
            return view('admin.dashboard')->with(['message' => $message, 'order' => $order]);
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

    public function charts() {
        $order =  Order::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->where('status', '0')
            ->pluck('count');
        return view('admin.dashboard')->with([ 'order' => $order]);
    }
}
