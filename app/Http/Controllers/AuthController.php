<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    function home() { return view('home'); }

    function registerationForm () {
        return view('register');
    }

    public function validateRequest(Request $req) {
        $rules = [
            'username' => 'required|string|unique:users',
            'password' => 'required|min:6'
        ];
        $this->validate($req, $rules);
    }

    function registerUser (Request $req) {
        $this->validateRequest($req);
        $apikey = base64_encode(uniqid());
        
        // create the user
        User::create([
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'api_key' => $apikey,
        ]);

        return redirect('/login');
    }

    function loginForm () {
        return view('login');
    }

    // verify the user
    function loginUser (Request $req) {
        $username = $req->username;
        $password = $req->password;
        $user = User::where('username', $username)->first();
        if($user && Hash::check($password, $user->password)) {
            // store api key in cache
            // $apikey = base64_encode(uniqid());
            // User::where('username', $req->username)->update(['api_key' => "$apikey"]);
            Cache::put('api_key', $user->api_key );
            // return response()->json($user, 200);

            return redirect('/');
        }
        // return response()->json(['message' => "User details incorrect"], 404);
        return redirect('/login');
    }

    function guestTest () {
        return "Guest";
    }

    function logout () {
        // remove api key from cache
        Cache::forget('api_key');
    }
    
}
