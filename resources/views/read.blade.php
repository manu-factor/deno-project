<html>
    <body>
        <h2>Reading records from Database</h2>
        
        @foreach ($data as $hole)
            <li><a href="/hole/{{$hole->id}}">{{ $hole->name }}</a></li>
        @endforeach
    </body>
</html>