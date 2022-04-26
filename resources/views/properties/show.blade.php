@extends('layouts.base')

@section('content')

<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card border-dark mb-3 mt-5 rounded-0">

      <h2 class="card-header rounded-0">Property Nº {{$property->id}}</h2>

      <div class="card-body">
        <p class="card-text"><strong>ADDRESS:</strong>  {{$property->address}}</p>
        <p class="card-text"><strong>CITY:</strong>  {{$city->name}}, {{$city->state}}, {{$city->country}}</p>
        <p class="card-text"><strong>TYPE:</strong>  {{$property->type}}</p>
        <p class="card-text"> <strong>AREA:</strong> {{$property->area}} m2</p>
        <p class="card-text"><strong>PRICE:</strong>  U$D {{$property->price}}</p>
        <p class="card-text"><strong>FOR:</strong>  {{$property->sale_rent}}</p>
        <p class="card-text"><strong>BEDS:</strong>  {{$property->beds}}</p>
        <p class="card-text"><strong>ROOMS:</strong>  {{$property->rooms}}</p>
        <p class="card-text"><strong>BATHS:</strong>  {{$property->baths}}</p>
        <p class="card-text"><strong>AGENT:</strong>  {{$agent->name}} (ID: {{$agent->id}})</p>
        <p class="card-text"><strong>DESCRIPTION:</strong>  {{$property->description}}</p>
      </div>

    </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-5">
    <a class="btn btn-primary rounded-0" href="{{ url("/properties") }}">Go back</a>
  </div>
</div>

@endsection