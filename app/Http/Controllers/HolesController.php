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

    function insertView () {
        return view('insert');
    }

    function read () {
        $data = Hole::all();
        return view('read')->with('data', $data);
    }

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

    function single_hole_view ($id) {
        $hole = Hole::find($id);
        return view('single')->with('hole', $hole);
    }

    function hole_update_view ($id) {
        $hole = Hole::find($id);
        return view('update')->with('hole', $hole);
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

    function getBoreHoles () {
		return Hole::all();
	}

    function filter_records (Request $req) {
        return response()->json(Hole::all()->toArray());
    }
}
