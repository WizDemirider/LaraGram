@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-4">
                            <img>
                        </div>
                        <div class="col-8">
                            <h2 class="mb-1">{{ $user->name }}</h2>
                            <div class="flex jutify-content-between align-items-baseline">
                                <a href=""></a>
                            </div>
                            <span>{{ $user->email }}</span><br>
                            <p>
                                {{ $user->profile->bio ?? 'No bio set' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
