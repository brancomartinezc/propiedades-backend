@extends('layouts.base')

@section('content')

    <div class="row justify-content-center mt-5"><img src="https://i.ibb.co/WcmGx37/united2.png" alt="company logo" id="united-logo"></div>
    <div class="row justify-content-center mt-5" id="welcome">Hello, {{ Auth::user()->name }}!</div>
    <div class="row justify-content-center mt-3" id="welcome">Welcome to the administration panel.</div>

    @if (Auth::user()->role == 'user')
        <div class="row justify-content-center mt-3" id="welcome">Ask an admin to give you a role.</div>
    @else
        <div class="row justify-content-center mt-5">
            <div class="col-md-2 text-center"><a class="btn btn-primary btn-lg rounded-0" href="{{ url("/cities") }}">CITIES</a></div>
            <div class="col-md-2 text-center"><a class="btn btn-primary btn-lg rounded-0" href="{{ url("/properties") }}">PROPERTIES</a></div>
            @if (Auth::user()->role == 'admin')
                <div class="col-md-2 text-center"><a class="btn btn-primary btn-lg rounded-0" href="{{ url("/users") }}">USERS</a></div>
            @endif
        </div>
    @endif

@endsection