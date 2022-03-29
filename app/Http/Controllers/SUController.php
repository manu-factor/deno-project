<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class SUController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    function logout () {
        // remove api key from cache
        Cache::forget('api_key');
        return redirect('/');
    }

    function authTest () {
        return "Auth";
    }


    // Logged in user functions
    function insert (Request $request) {
        Hole::create([
            'owner_name' => $request->owner_name,
            'file_no' => $request->file_no,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'z_axis' => $request->z_axis,
            'DOI' => $request->DOI,
            'mapsheet' => $request->mapsheet,
            'SRO' => $request->SRO,
            'category' => $request->category,
            'the_type' => $request->the_type,
        ]);
        return view('home');
    }

    function hole_update_view ($id) {
        $hole = Hole::find($id);
        return view('update')->with('hole', $hole);
    }

    function insertView () {
        return view('insert');
    }

    function hole_update_content ( Request $request, $id ) {
        $hole = Hole::find($id);
        $hole->owner_name = $request->owner_name;
        $hole->file_no = $request->file_no;
        $hole->mapsheet = $request->mapsheet;
        $hole->longitude = $request->longitude;
        $hole->latitude = $request->latitude;
        $hole->z_axis = $request->z_axis;
        $hole->the_type = $request->the_type;
        $hole->category = $request->category;
        $hole->DOI = $request->DOI;
        $hole->SRO = $request->SRO;
        $hole->save();
        return view('home');
    }

    function delete ($id) {
        $hole = Hole::find($id);
        $hole->delete();
        return view('home');
    }
}
