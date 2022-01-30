<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borehole System</title>
    
    <link rel="stylesheet" href="{{ url('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container">
        <a class="navbar-brand" href="/">
          
          <h5><img src="{{ url('logo.jpeg') }}" alt="" width="60" /> <b class="the_title">NYERI COUNTY BOREHOLE MANAGEMENT SYSTEM</b></h5>
        </a>
      </div>
    </nav>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container">
        <div class="navbar-nav">
          <a class="nav-link" href="/">Homepage</a>
          <a class="nav-link" href="/read">See All</a>
          <a class="nav-link" href="/insert">Add New</a>
        </div>
      </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src='{{ url("main.js") }}'></script>
</body>
</html>

