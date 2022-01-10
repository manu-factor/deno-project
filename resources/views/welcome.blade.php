@extends('layouts/app')

@section('content')

<div class="section container my-5">
    <div id="map">
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer">&#10006;</a>
            <div id="popup-content"></div>
        </div>
    </div>
    <hr>
    <br>
    <div>
        <h4>Search by owner:</h4>
        <input type="text" placeholder="Search Users" id="filter_users"/>
        <ul id="users-list"></ul>
    </div>
    
</div>

@endsection
