@extends('layouts.base')

@section('content')

<div class="row mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card border-dark mb-3 mt-5 rounded-0">

            <h2 class="card-header text-center rounded-0">New city</h2>

            <div class="card-body">
                <form method="POST" action="{{ url('/cities') }}">
                    <div class="form-group">
                        @csrf
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control rounded-0" value="{{ old('name') }}">
                        <label for="" class="form-label">State/Province</label>
                        <input type="text" name="state" class="form-control rounded-0" value="{{ old('state') }}">
                        <label for="" class="form-label">Country</label>
                        <input type="text" name="country" class="form-control rounded-0" value="{{ old('country') }}">
                        <label for="" class="form-label">Country code</label>
                        <input type="text" name="country_code" class="form-control rounded-0" value="{{ old('country_code') }}">
                    </div>

                    <div class="row mt-4">
                    <div class="col-md-3">
                        <a class="btn btn-danger rounded-0" href="{{ url("/cities") }}">Cancel</a>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success rounded-0">Create</button>
                    </div>
                </div>
                </form>
                
            </div>

        </div>
    </div>
</div>

@endsection