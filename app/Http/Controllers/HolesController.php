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

    function read () {
        $data = Hole::all();
        return view('read')->with('data', $data);
    }

    function single_hole_view ($id) {
        $hole = Hole::find($id);
        return view('single')->with('hole', $hole);
    }

    function getBoreHoles () {
		return Hole::all();
	}

    function filter_records (Request $req) {
        return response()->json(Hole::all()->toArray());
    }
}
