@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <img src="/storage/{{ $post->image }}" class="w-100">
                    </div>
                    <div class="col-md-4 card-body">
                    <div class="d-flex align-items-center" id="profile-block">
                        <div>
                            <a href="/profile/{{ $post->user->id }}">
                                <img src="/storage/{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px;">
                            </a>
                        </div>
                        <div class="d-flex pl-2 align-items-center" style="font-weight: bold; font-size:larger;">
                            <a href="/profile/{{ $post->user->id }}" style="color: black">{{ $post->user->username }}</a>
                        </div>
                    </div>
                    <hr>
                        <span style="color:#999">{{ $post->created_at }}</span><br>
                        <p>{{ $post->caption }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
