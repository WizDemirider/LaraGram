@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="/post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="caption" class="col-md-2 col-form-label text-md-right">Caption</label>

                            <div class="col-md-8">
                                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-2 col-form-label text-md-right">Image</label>

                            <div class="col-md-8">
                                <input id="image" type="file" class="form-control-file" name="image" required>

                                @error('image')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary offset-1">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection