<?php

namespace App\Http\Controllers;

use App\Models\FoodDetail;
use App\Models\Foodtype;
use App\Models\Event;
use App\Models\Message;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\NewContactMessageNotification;
use Illuminate\Support\Facades\Notification;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $foodtypes = Foodtype::with('foods')->where('status', '1')->get();
        $foods = FoodDetail::with('foodtype')->where('status', '1')->get();
        $specials = FoodDetail::with('foodtype')
            ->where('status', '1')->get();
        $events = Event::where('status', '1')->get();
        return view('website.index')->with([
            'foodtypes' => $foodtypes,
            'foods' => $foods,
            'specials' => $specials,
            'events' => $events,
        ]);
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
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);


        $contact = new Message();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        $admins = User::all();
        if ($admins->isNotEmpty()) {
            Notification::send($admins, new NewContactMessageNotification($contact));
        }

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Message has been sent successfully.',
            ]);
        }

        return redirect()->route('home')->with('success', 'Message has been sent successfully.');
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
