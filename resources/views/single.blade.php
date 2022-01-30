@extends('layouts/app')

@section('content')

<section class="container single-hole">

    <h2>Single Borehole</h2>
    <hr>
    <b>Owner Name: </b>{{ $hole->owner_name }}<br>
    <b>File No: </b>{{ $hole->file_no }}<br>
    <b>Mapsheet: </b>{{ $hole->mapsheet }}<br>
    <b>SRO: </b>{{ $hole->SRO }}<br>
    <b>Category: </b>{{ $hole->category }}<br>
    <b>Type: </b>{{ $hole->the_type }}<br>
    <b>Date of Installation: </b>{{ $hole->DOI }}<br>
    <b>Longitude: </b>{{ $hole->longitude }}<br>
    <b>Latitude: </b>{{ $hole->latitude }}<br>
    <b>Depth(z-axis): </b>{{ $hole->z_axis }}<br>
    <br>
    <a href="/hole/update/{{ $hole->id }}" class="btn btn-sm btn-dark">Edit</a>
    <a href="/hole/delete/{{ $hole->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete Borehole?')">Delete</a>
</section>
    
@endsection