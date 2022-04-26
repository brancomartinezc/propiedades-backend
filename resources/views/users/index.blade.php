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
            <td>{{$user->role}}</td>
            <td>
                <form method="POST" action="{{ route ('users.destroy',$user->id) }}">
                    <a class="btn btn-success rounded-0" href="{{ url("/users/{$user->id}/edit") }}">Change Role</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-0" onclick="return confirm('Are you shure you want to delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}

@endsection