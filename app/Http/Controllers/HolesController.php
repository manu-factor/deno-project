<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hole;

class HolesController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct() {}

    function welcome () { return view('welcome'); }

    function home () {
        return view('home');
    }
	
	function getBoreHoles () {
		return Hole::all();
	}

    function insert (Request $request) {
        Hole::create([
            'name' => $request->name,
            'location' => $request->location,
            'long' => $request->long,
            'lat' => $request->lat,
            'agency' => $request->agency,
            'DOI' => $request->doi,
            'tapping' => $request->tapping,
            'status' => true,
        ]);
        return view('home');
    }

    function insertView () {
        return view('insert');
    }

    function read () {
        $data = Hole::all();
        return view('read')->with('data', $data);
    }

    function update () {
        $data = Hole::all();
        return view('update')->with('data', $data);
    }

    function single_hole_view ($id) {
        $hole = Hole::find($id);
        return view('single')->with('hole', $hole);
    }

    function hole_update_view ($id) {
        $hole = Hole::find($id);
        return view('insert-update')->with('hole', $hole);
    }

    function hole_update_content ( Request $request, $id ) {
        $hole = Hole::find($id);
        $hole->name = $request->name;
        $hole->location = $request->location;
        $hole->long = $request->long;
        $hole->lat = $request->lat;
        $hole->agency = $request->agency;
        $hole->DOI = $request->doi;
        $hole->tapping = $request->tapping;
        $hole->status = true;
        $hole->save();
        return view('home');
    }

    function delete_view () {
        $data = Hole::all();
        return view('delete')->with('data', $data);
    }

    function delete ($id) {
        $hole = Hole::find($id);
        $hole->delete();
        return view('home');
    }

    function get_owners (Request $req) {
        $owners = Hole::all()->pluck('owner_name')->toArray();
        return $owners;
    }
}
