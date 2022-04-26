@extends('layouts.base')

@section('content')

<div class="row justify-content-end mt-5">
    <div class="col-md-2"><a class="btn btn-warning rounded-0" href="{{ url("/properties/create") }}">Add new</a></div> 
</div>

<table class="table table-hover mt-3">
    <thead>
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Type</th>
            <th scope="col">City</th>
            <th scope="col">Address</th>
            <th scope="col">Sale/Rent</th>
            <th scope="col">Agent ID</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($properties as $prop)
        <tr class="table-dark">
            <td>{{$prop->id}}</td>
            <td>{{$prop->type}}</td>
            <td>{{$prop->city_name}}, {{$prop->city_state}}, {{$prop->city_country_code}}</td>
            <td>{{$prop->address}}</td>
            <td>{{$prop->sale_rent}}</td>
            <td>{{$prop->agent_id}}</td>
            <td>
                <form method="POST" action="{{ route ('properties.destroy',$prop->id) }}">
                    <a class="btn btn-primary rounded-0" href="{{ url("/properties/{$prop->id}") }}">More info</a>
                    <a class="btn btn-success rounded-0" href="{{ url("/properties/{$prop->id}/edit") }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-0" onclick="return confirm('Are you shure you want to delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $properties->links() }}

@endsection