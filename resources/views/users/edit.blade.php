@extends('layouts.base')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card border-dark mb-3 mt-5 rounded-0">

            <h2 class="card-header text-center rounded-0">Change {{$user->name}}'s role</h2>

            <div class="card-body">
                <form method="POST" action="/users/{{$user->id}}">
                        
                        
                        <fieldset class="form-group">
                            @csrf
                            @method('PUT')
                            <label for="" class="form-label">Current role:  <strong>{{$user->role}}</strong></label><br>
                            <label for="" class="form-label">Select new role</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="role" value="user">
                                    User
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="role" value="agent">
                                    Agent
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="role" value="chief-agent">
                                    Chief Agent
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="role" value="admin">
                                    Admin
                                </label>
                            </div>
                        </fieldset>
                    

                    <div class="row mt-4">
                        <div class="col-md-3">
                            <a class="btn btn-danger rounded-0" href="{{ url("/users") }}">Cancel</a>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success rounded-0">Change</button>
                        </div>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
</div>

@endsection