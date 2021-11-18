@extends('layouts/app')

@section('content')

<div class="section container my-5">
    <h1>OL Project</h1>
    <div class="row">
        <div class="col-md-9">
            <div id="map"></div>
                <div id="popup" class="ol-popup">
                    <a href="#" id="popup-closer" class="ol-popup-closer">&#10006;</a>
                <div id="popup-content"></div>
            </div>
        </div>
        <div class="col-md-3">
            <h2>Search:</h2>
            <input class="form-control"><br>
            <button class="btn btn-primary">Search</button>
            <ul>
                <li>Search the database</li>
            </ul>
        </div>
    </div>
    <br>
    <div>
        <h1>All Results</h1>
        <ul>
            <li>Display any relevant info</li>
            <li>Filter by attributes</li>
        </ul>
    </div>
</div>

@endsection
