<html>
    <body>
        <h2>Select record to Update in Database</h2>
        
        @foreach ($data as $hole)
            <div class="single-hole"><a href="/hole/update/{{$hole->id}}">{{ $hole->name }}</a></div>
        @endforeach
    </body>
</html>