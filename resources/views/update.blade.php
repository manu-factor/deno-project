@extends('layouts/app')

@section('content')

<section class="container update-section">
    <h2>Update Borehole details</h2>
    <hr>
    <form action="/hole/update/{{ $hole->id }}" method="post" class="updateForm">

        <label>Borehole Owner Name</label><br>
        <input class="form-control form-control-sm" name="owner_name" required value="{{ $hole->owner_name}}"/><br>

        <div class="row g-2">
            <div class="col-sm">
                <label>File No</label><br>
                <input class="form-control form-control-sm" name="file_no" required value="{{ $hole->file_no}}"/><br>
            </div>
            <div class="col-sm">
                <label>Mapsheet</label><br>
                <input class="form-control form-control-sm" name="mapsheet" required value="{{ $hole->mapsheet}}"/><br>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-sm">
                <label>Form Type:</label><br>
                <input class="form-control form-control-sm" name="the_type" required value="{{ $hole->the_type}}"/><br>
            </div>
            <div class="col-sm">
                <label>Category</label><br>
                <input class="form-control form-control-sm" name="category" required value="{{ $hole->category}}"/><br>
            </div>
            <div class="col-sm">
                <label>SRO</label><br>
                <input class="form-control form-control-sm" name="SRO" required value="{{ $hole->SRO}}"/><br>
            </div>
        </div>

        <label>Date of Installation</label><br>
        <input class="form-control form-control-sm" type="date" name="DOI" required value="{{ $hole->DOI}}"><br>

        <div class="row g-3">
            <div class="col-sm">
                <label>Longitude Coordinate</label><br>
                <input class="form-control form-control-sm" name="longitude" required value="{{ $hole->longitude}}"/><br>
            </div>
            <div class="col-sm">
                <label>Latitude Coordinate</label><br>
                <input class="form-control form-control-sm" name="latitude" required value="{{ $hole->latitude}}"/><br>
            </div>
            <div class="col-sm">
                <label>Z Coordinate</label><br>
                <input class="form-control form-control-sm" name="z_axis" required value="{{ $hole->z_axis}}"/><br>
            </div>
        </div> 
        
        <input class="form-control form-control-sm btn btn-primary" type="submit" value="Submit"><br>
    </form>
</section>
    
@endsection