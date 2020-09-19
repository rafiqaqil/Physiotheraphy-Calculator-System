@extends('layouts.boot')

@section('content')
<div class="container">
    <form action="/edit/{{$post->id}}/{{ $post->user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Update Post</h1>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                    <input id="caption"
                           type="text"
                           class="form-control{{ $errors->has('caption') ? ' is-invalid' : '' }}"
                           name="caption"
                           value="{{ $post->caption }}"
                           autocomplete="caption" autofocus>

                    @if ($errors->has('caption'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('caption') }}</strong>
                        </span>
                    @endif
                </div>  
                <div class="row">
            <label for="caption" class="col-md-4 col-form-label">Current Image</label> 
            <img src="/storage/{{ $post->image }}" class="w-100">
                
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Choose New Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Update Post</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
