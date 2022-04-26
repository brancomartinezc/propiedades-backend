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
    <div class="col-md-6">
        <div class="card border-dark mb-3 mt-5 rounded-0">

            <h2 class="card-header text-center rounded-0">Edit property</h2>

            <div class="card-body">
                <form method="POST" action="/properties/{{$property->id}}">
                    <div class="form-group">
                        @csrf
                        @method('PUT')
                        <label for="" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control rounded-0" value="{{$property->address}}">

                        <label for="" class="form-label">City ↓</label>
                        <select name="city_id" class="form-control rounded-0">
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}" {{ ($city->id == $property->city_id) ? "selected" : "" }}> {{$city->name}}, {{$city->state}}, {{$city->country_code}} </option>
                            @endforeach
                        </select>
                        
                        <label for="" class="form-label">Type</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" value="house"
                                {{ ($property->type == "house") ? "checked" : "" }}>
                                House
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" value="apartment"
                                {{ ($property->type == "apartment") ? "checked" : "" }}>
                                Apartment
                            </label>
                        </div>
                        
                        <label for="" class="form-label">Area (m2)</label>
                        <input type="text" name="area" class="form-control rounded-0" value="{{$property->area}}">
                        <label for="" class="form-label">Price (U$D)</label>
                        <input type="text" name="price" class="form-control rounded-0" value="{{$property->price}}">

                        <label for="" class="form-label">For</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sale_rent" value="sale" 
                                {{ ($property->sale_rent == "sale") ? "checked" : "" }}>
                                Sale
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sale_rent" value="rent"
                                {{ ($property->sale_rent == "rent") ? "checked" : "" }}>
                                Rent
                            </label>
                        </div>
                        
                        <label for="" class="form-label">Beds</label>
                        <input type="text" name="beds" class="form-control rounded-0" value="{{$property->beds}}">
                        <label for="" class="form-label">Rooms</label>
                        <input type="text" name="rooms" class="form-control rounded-0" value="{{$property->rooms}}">
                        <label for="" class="form-label">Baths</label>
                        <input type="text" name="baths" class="form-control rounded-0" value="{{$property->baths}}">
                        <label for="" class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control rounded-0" 
                            rows="10"> {{$property->description}} </textarea>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-3">
                            <a class="btn btn-danger rounded-0" href="{{ url("/properties") }}">Cancel</a>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success rounded-0">Edit</button>
                        </div>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
</div>

@endsection