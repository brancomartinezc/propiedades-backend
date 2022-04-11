@extends('layouts.base')

@section('content')

    <div class="row justify-content-center mt-5"><img src="https://i.ibb.co/WcmGx37/united2.png" alt="company logo" id="united-logo"></div>
    <div class="row justify-content-center mt-5" id="welcome">Welcome to the web administration!</div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-2 text-center"><a class="btn btn-primary btn-lg rounded-0" href="{{ url("/cities") }}">CITIES</a></div>
        <div class="col-md-2 text-center"><a class="btn btn-primary btn-lg rounded-0" href="{{ url("/properties") }}">PROPERTIES</a></div>
        <div class="col-md-2 text-center"><a class="btn btn-primary btn-lg rounded-0" href="{{ url("/users") }}">USERS</a></div>
    </div>

@endsection