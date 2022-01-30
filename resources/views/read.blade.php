@extends('layouts/app')

@section('content')

<div class="container">
    <h2>ALL BOREHOLES</h2>
    <hr>
    <section class="all-section">
        <table class="table table-striped">
            <thead class="thead thead-dark">
              <tr>
                <th scope="col">Owner Name</th>
                <th scope="col">File No</th>
                <th scope="col">Mapsheet</th>
                <th scope="col">Category</th>
                <th scope="col">Type</th>
                <th scope="col">SRO</th>
                <th scope="col">Installation Date</th>
                <th scope="col">Depth(feet)</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $hole)
                    <tr class="singleRow" onclick="window.location='/hole/{{ $hole->id }}'">
                        <th>{{ $hole->owner_name}}</th>
                        <td>{{ $hole->file_no}}</td>
                        <td>{{ $hole->mapsheet}}</td>
                        <td>{{ $hole->category}}</td>
                        <td>{{ $hole->the_type}}</td>
                        <td>{{ $hole->SRO }}</td>
                        <td>{{ $hole->DOI}}</td>
                        <td>{{ $hole->z_axis}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </section>
</div>
    
@endsection
