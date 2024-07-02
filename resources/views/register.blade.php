@extends('layouts.guest')

@section('content')
    <div class="user-form">
        <h1>Register</h1>
        <form action="/register" method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="/login">Login</a></p>
    </div>
@endsection