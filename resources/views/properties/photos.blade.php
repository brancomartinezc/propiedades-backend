@extends('layouts.base')
@section('content')
    <div class="row mt-4">
        <h2>Property Nº {{$property->id}}</h2>
    </div>

    <div class="row mt-4">
        <div class="col-md-2">
            <a class="btn btn-primary rounded-0" href="{{ url("/properties") }}">Go back</a>
        </div>
    </div>

    <div class="row mt-4">
        <form method="POST" action="{{ url('/photos') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-5 form-group">
                <label for="files" class="form-label">Upload property photos</label>
                <input type="file" name="photos[]" class="form-control rounded-0" multiple>
                <input type="hidden" name="prop_id" class="form-control rounded-0" accept="image/*" value="{{ $property->id }}">
            </div>
            <div class="col-md-2 mt-2">
                <button type="submit" class="btn btn-primary rounded-0">Upload</button>
            </div>
        </form>
    </div>
    
    <div class="row mt-4">
        @forelse ($photos as $photo)
            <div class="col-md-3 mb-2">
                <div class="card mb-3" id="photo-prop">
                    <div class="card-body">
                        <img src="/properties_images/{{$photo->path}}" class="card-img-top">
                    </div>
                </div>
                <form method="POST" action="{{ route ('photos.destroy',$photo->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-0">Delete</button>
                </form>
            </div>
            
        @empty
            <div class="col-md-3"> No photos yet. </div>
        @endforelse
    </div>

@endsection