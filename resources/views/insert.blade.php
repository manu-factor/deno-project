@extends('layouts/app')

@section('content')

<section class="container create-new">
    <h2>Insert to Database</h2>
    <hr>
    <form action="/insert" method="post" class="insertForm">

        <label>Borehole Owner Name</label><br>
        <input class="form-control form-control-sm" name="owner_name" required/><br>

        <div class="row g-2">
            <div class="col-sm">
                <label>File No</label><br>
                <input class="form-control form-control-sm" name="file_no" required/><br>
            </div>
            <div class="col-sm">
                <label>Mapsheet</label><br>
                <input class="form-control form-control-sm" name="mapsheet" required/><br>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-sm">
                <label>Form Type:</label><br>
                <input class="form-control form-control-sm" name="the_type" required/><br>
            </div>
            <div class="col-sm">
                <label>Category</label><br>
                <input class="form-control form-control-sm" name="category" required/><br>
            </div>
            <div class="col-sm">
                <label>SRO</label><br>
                <input class="form-control form-control-sm" name="SRO" required/><br>
            </div>
        </div>

        <label>Date of Installation</label><br>
        <input class="form-control form-control-sm" type="date" name="DOI" required><br>

        <div class="row g-3">
            <div class="col-sm">
                <label>Longitude Coordinate</label><br>
                <input class="form-control form-control-sm" name="longitude" required/><br>
            </div>
            <div class="col-sm">
                <label>Latitude Coordinate</label><br>
                <input class="form-control form-control-sm" name="latitude" required/><br>
            </div>
            <div class="col-sm">
                <label>Z Coordinate</label><br>
                <input class="form-control form-control-sm" name="z_axis" required/><br>
            </div>
        </div> 
        
        <input class="form-control form-control-sm btn btn-primary" type="submit" value="Submit"><br>
    </form>

</section>
    
@endsection