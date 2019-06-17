@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-3">
                    <img src="/storage/{{ $user->profile->profileImage() }}" class="w-100 rounded-circle">
                </div>
                <div class="col-9">
                    <div class="d-flex align-items-baseline">
                        <div class="mb-1 h2">
                            {{ $user->username }}
                        </div>
                        <div class="pl-3 pull-right">
                            @can('update', $user->profile)
                                <a href="/profile/{{ $user->id }}/edit" style="font-size:large"><i class="fas fa-edit pl-5"></i> Edit</a>
                            @elsecannot('update', $user->profile)
                                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                            @endcan
                        </div>
                    </div>
                    <span class="mb-1">{{ $user->name }}</span><br>
                    <span class="pr-5"><strong>{{ $user->posts->count() }}</strong> Posts</span>
                    <span class="pr-5"><strong>{{ $user->profile->following->count() }}</strong>
                    @if($user->profile->following->count() == 1)
                    Follower
                    @else
                    Followers
                    @endif
                    </span>
                    <span class="pr-5"><strong>{{ $user->following->count() }}</strong> Following</span><br>
                    <span>{{ $user->email }}</span><br>
                    <p>
                        {{ $user->profile->bio ?? 'No bio set' }}
                    </p>
                </div>
                <div class="col-2" style="text-align: right">

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-8">
                <h4>Posts</h4>
                </div>
                <div class="col-4 pr-3 pt-1 flexalign-items-baseline" style="text-align: right">
                    @can('update', $user->profile)
                    <a href="/post/create">New Post</a>
                    @endcan
                </div>
            </div>
            <div class="row">
            @foreach($user->posts as $post)
                <div class="col-4">
                    <a href="/post/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
