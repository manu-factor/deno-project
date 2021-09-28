<html>
    <body>
        <h1>Map Project</h1>
        <h2>Single Borehole - {{ $hole->name }}</h2>
        <b>Name: </b>{{ $hole->name }}<br>
        <b>Location: </b>{{ $hole->location }}<br>
        <b>Longitude: </b>{{ $hole->long }}<br>
        <b>Latitude: </b>{{ $hole->lat }}<br>
        <b>Agency: </b>{{ $hole->agency }}<br>
        <b>Tapping: </b>{{ $hole->tapping }}<br>
        <b>Date of Installment: </b>{{ $hole->DOI }}<br>
        <b>Status: </b>{{ $hole->status }}<br>
        <br>
        <a href="/hole/update/{{ $hole->id }}">Edit</a>
        <a href="/hole/delete/{{ $hole->id }}">Delete</a>
    </body>
</html>