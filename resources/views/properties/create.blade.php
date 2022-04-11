@extends('layouts.base')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-dark mb-3 mt-5 rounded-0">

            <h2 class="card-header text-center rounded-0">New property</h2>

            <div class="card-body">
                <form method="POST" action="{{ url('/properties') }}">
                    <div class="form-group">
                        @csrf
                        <label for="" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control rounded-0">

                        <label for="" class="form-label">City ↓</label>
                        <select name="city_id" class="form-control rounded-0">
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}, {{$city->state}}, {{$city->country_code}} </option>
                            @endforeach
                        </select>
                        
                        <label for="" class="form-label">Type</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" value="house">
                                House
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" value="apartment">
                                Apartment
                            </label>
                        </div>
                        
                        <label for="" class="form-label">Area</label>
                        <input type="text" name="area" class="form-control rounded-0">
                        <label for="" class="form-label">Price (U$D)</label>
                        <input type="text" name="price" class="form-control rounded-0">

                        <label for="" class="form-label">For</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sale_rent" value="sale">
                                Sale
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sale_rent" value="rent">
                                Rent
                            </label>
                        </div>
                        
                        <label for="" class="form-label">Beds</label>
                        <input type="text" name="beds" class="form-control rounded-0">
                        <label for="" class="form-label">Rooms</label>
                        <input type="text" name="rooms" class="form-control rounded-0">
                        <label for="" class="form-label">Baths</label>
                        <input type="text" name="baths" class="form-control rounded-0">
                        <label for="" class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control rounded-0" rows="10"></textarea>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-3">
                            <a class="btn btn-danger rounded-0" href="{{ url("/properties") }}">Cancel</a>
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