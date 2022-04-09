@extends('layouts.base')

@section('content')

<table class="table table-hover mt-5">
    <thead>
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">State/Province</th>
            <th scope="col">Country</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($cities as $city)
        <tr class="table-dark">
            <td>{{$city->id}}</td>
            <td>{{$city->name}}</td>
            <td>{{$city->state}}</td>
            <td>{{$city->country}}</td>
            <td>
                <a class="btn btn-success rounded-0" href="#">Edit</a>
                <a class="btn btn-danger rounded-0" href="#">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection