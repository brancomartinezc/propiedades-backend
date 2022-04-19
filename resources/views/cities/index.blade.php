@extends('layouts.base')

@section('content')

@if (Auth::user()->role != 'agent')
    <div class="row justify-content-end mt-5">
        <div class="col-md-2"><a class="btn btn-warning rounded-0" href="{{ url("/cities/create") }}">Add new</a></div> 
    </div>
@endif

<table class="table table-hover mt-3">
    <thead>
        <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">State/Province</th>
            <th scope="col">Country</th>
            @if (Auth::user()->role != 'agent')
                <th scope="col">Actions</th>
            @endif
        </tr>
    </thead>

    <tbody>
        @foreach ($cities as $city)
        <tr class="table-dark">
            <td>{{$city->id}}</td>
            <td>{{$city->name}}</td>
            <td>{{$city->state}}</td>
            <td>{{$city->country}}</td>
            @if (Auth::user()->role != 'agent')
                <td>
                    <form method="POST" action="{{ route ('cities.destroy',$city->id) }}">
                        <a class="btn btn-success rounded-0" href="{{ url("/cities/{$city->id}/edit") }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-0">Delete</button>
                    </form>
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

{{ $cities->links() }}

@endsection