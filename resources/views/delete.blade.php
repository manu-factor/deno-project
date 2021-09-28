<html>
    <body>
        <h2>Delete records from Database</h2>
        
        @foreach ($data as $hole)
            <div class="single-hole"><a href="/hole/delete/{{$hole->id}}">{{ $hole->name }}</a></div>
        @endforeach
    </body>
</html>