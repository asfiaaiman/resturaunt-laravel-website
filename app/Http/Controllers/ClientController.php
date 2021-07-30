<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class ClientController extends Controller
{
    public function index() {

    }

    public function signup() {
        return view('website.clients.signup');
    }

    public function store(Request $request) {
        $this->validate($request, [
              'name' => 'required',
              'email' => 'required|email|unique:clients',
              'password' => 'required'
        ]);
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = bcrypt($request->password);
        $client->save();
        return redirect('detailedMenu');

    }

    public function signin() {
        return view('website.clients.signin');
    }
    public function storeClients(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]); 
         $password = \Hash::make($request['password']);
        $credentials = $request->only('email', 'password'); 
        if (auth()->attempt($credentials)) {
            dd("I am in if");
        }

        else{
            return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        }
       

        

    }

    public function profile() {
        return view('website.clients.profile') ;
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
