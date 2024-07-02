@extends('layouts.app')

@section('content')
 <p>Welcome to {{ $_ENV['APP_NAME']}}, {{ auth()->user()->name }}!</p>
@endsection