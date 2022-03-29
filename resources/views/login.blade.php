@extends('layouts/app')

@section('content')

<section class="container login-form">

    <h2>Login to User Account</h2>
    <hr>
    <form action="/loginUser" method="post">
        <input name="username" placeholder="Username"/><br><br>
        <input name="password" type="password" placeholder="Password"/><br><br>
        <input type="submit" value="Login" class="btn btn-primary">
    </form>
</section>
    
@endsection