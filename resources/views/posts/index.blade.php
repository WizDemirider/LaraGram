@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="offset-md-2 col-md-5">
            @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-header">
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
                </div>
                <div class="card-image">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </div>
                <div class="card-body">
                    <span style="color:#999">{{ $post->created_at }}</span><br>
                    <p>{{ $post->caption }}</p>
                </div>
            </div>
            @endforeach
            {{ $posts->links() }}
        </div>

        <div class="offset-md-1 col-md-3">
            <div class="card" style="position: fixed;z-index: 2;width:25%">
                <div class="card-header">
                    <div class="d-flex align-items-center" id="profile-block">
                        <div>
                            <a href="/profile/{{ Auth::user()->id }}">
                                <img src="/storage/{{ Auth::user()->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px;">
                            </a>
                        </div>
                        <div class="d-flex pl-2 align-items-center" style="font-weight: bold; font-size:larger;">
                            <a href="/profile/{{ Auth::user()->id }}" style="color: black">{{ Auth::user()->username }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach(Auth::user()->following()->take(5)->get() as $followed)
                        <div class="d-flex align-items-center" id="profile-block">
                            <div>
                                <a href="/profile/{{ $followed->user->id }}">
                                    <img src="/storage/{{ $followed->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px;">
                                </a>
                            </div>
                            <div class="d-flex pl-2 align-items-center" style="font-weight: bold; font-size:larger;">
                                <a href="/profile/{{ $followed->user->id }}" style="color: black">{{ $followed->user->username }}</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <span class="pr-5"><strong>{{ Auth::user()->posts->count() }}</strong> Posts</span>
                    <span class="pr-5"><strong>{{ Auth::user()->profile->following->count() }}</strong>
                    @if(Auth::user()->profile->following->count() == 1)
                    Follower
                    @else
                    Followers
                    @endif
                    </span>
                    <span class="pr-5"><strong>{{ Auth::user()->following->count() }}</strong> Following</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
