@extends('layouts/app')

@section('content')

<div class="section container mt-5">
    <div id="map">
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer">&#10006;</a>
            <div id="popup-content"></div>
        </div>
    </div>
    <hr>
    <br>
    <div>
        <h4 class="text-center">
            FILTER BY 
            <select id="selectVal" class="" aria-label="Default select example">
                <option selected value="owner_name">Owner Name</option>
                <option value="file_no">File No</option>
                <option value="mapsheet">Mapsheet</option>
                <option value="category">Category</option>
                <option value="the_type">Type</option>
                <option value="SRO">SRO</option>
                <option value="DOI">Date of Installment</option>
                <option value="z_axis">Depth(z-axis)</option>
            </select>
        </h4>
        <br>
        
        <input placeholder="Filter" id="filter_users" class="form-control"/>
        
    </div>
    
</div>

<section class="filter-section">
    <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Owner Name</th>
            <th scope="col">File No</th>
            <th scope="col">Mapsheet</th>
            <th scope="col">Category</th>
            <th scope="col">Type</th>
            <th scope="col">SRO</th>
            <th scope="col">Date of Installment</th>
            <th scope="col">Depth(z-axis)</th>
          </tr>
        </thead>
        <tbody id="users-list"></tbody>
      </table>
</section>


@endsection