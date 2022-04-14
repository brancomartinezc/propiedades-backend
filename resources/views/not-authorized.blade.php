@extends('layouts.base')

@section('content')

    <div class="row justify-content-center mt-5"><img src="https://i.ibb.co/vhqqm3S/not-auth.png" alt="not authorized" id="united-logo"></div>
    <strong class="row justify-content-center mt-5" id="welcome">NOT AUTHORIZED</strong>
    @if(Auth::user()->role == "user")
        <div class="row justify-content-center mt-3" id="welcome">Ask an admin to give you a role.</div>
    @endif
    <div class="row justify-content-center mt-4">
        <div class="col-md-2">
            <a class="btn btn-primary btn-lg rounded-0" href="{{ url()->previous() }}">Go back</a>
        </div>
    </div>

@endsection