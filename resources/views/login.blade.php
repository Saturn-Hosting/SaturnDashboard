@extends('layouts.guest')

@section('content')
    <div class="user-form">
        <h1>Login</h1>
        <form action="/login" method="post">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="/register">Register</a></p>
    </div>
@endsection