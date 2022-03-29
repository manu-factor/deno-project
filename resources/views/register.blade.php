@extends('layouts/app')

@section('content')

<section class="container registration-form">

    <h2>Register User Account</h2>
    <hr>
    <form action="/registerUser" method="post">
        <input name="username" placeholder="Username"/><br><br>
        <input name="password" type="password" placeholder="Password"/><br><br>
        <input type="submit" value="Register" class="btn btn-success">
    </form>
</section>
    
@endsection