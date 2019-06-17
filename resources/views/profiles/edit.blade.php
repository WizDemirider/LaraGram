@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit Profile
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center" id="profile-block">
                        <div>
                            <a href="/profile/{{ $user->id }}">
                                <img src="/storage/{{ $user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px;">
                            </a>
                        </div>
                        <div class="d-flex pl-2 align-items-center" style="font-weight: bold; font-size:larger;">
                            <a href="/profile/{{ $user->id }}" style="color: black">{{ $user->username }}</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form method="post" action="/profile/{{ $user->id }}" enctype="multipart/form-data" style="width: 100%">
                            @csrf
                            @method('patch')

                            <h3 style="text-align: center; width: 100%">Fill in the following:</h3>

                            <div class="form-group row">
                                <label for="bio" class="offset-md-2 col-md-2 col-form-label text-md-right">Bio</label>

                                <div class="col-md-6">
                                    <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') ?? $user->bio }}" autocomplete="bio" autofocus>

                                    @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="offset-md-2 col-md-2 col-form-label text-md-right">Profile Picture</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control-file" name="profilePic">

                                    @error('image')
                                            <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-1 offset-md-4 col-md-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection