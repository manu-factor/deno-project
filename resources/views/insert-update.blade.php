<html>
    <body>
        <h1>Map Project</h1>
        <h2>Update Record</h2>
        <form action="/hole/update/{{ $hole->id }}" method="post">
            <label>Borehole Name</label><br>
            <input name="name" value="{{ $hole->name }}" required/><br>
            <label>Location</label><br>
            <input name="location" value="{{ $hole->location }}" required/><br>
            <label>Longitude Coordinate</label><br>
            <input name="long" value="{{ $hole->long }}" required/><br>
            <label>Latitude Coordinate</label><br>
            <input name="lat" value="{{ $hole->lat }}" required/><br>
            <label>Agency</label><br>
            <input name="agency" value="{{ $hole->agency }}" required/><br>
            <label>Date of Installment</label><br>
            <input type="date" name="doi" value="{{ $hole->DOI }}" required><br>
            <label>Tapping</label><br>
            <input name="tapping" value="{{ $hole->tapping }}" required/><br>
            <label>Status</label><br>
            <input name="status" value="{{ $hole->status }}" required/><br><br>
            <input type="submit" value="Submit"><br>
        </form>
    </body>
</html>