@extends('layouts.base')

@section('content')

<table class="table table-hover mt-5">
    <thead>
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        <tr class="table-dark">
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->rol}}</td>
            <td>
                <a class="btn btn-success rounded-0" href="#">Change Role</a>
                <a class="btn btn-danger rounded-0" href="#">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection