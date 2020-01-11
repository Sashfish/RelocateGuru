@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="http://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ $user->avatar }}" class="rounded-circle w-75">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->name }}</div>

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                    <a href="{{route('tip.create')}}">Add New Tip</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $tipCount }}</strong> tips</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
           
        </div>
    </div>
    <hr> 
    <div class="row pt-5">
        @foreach($user->tip as $tip)
            <div class="col-4 pb-4">
                <div class="card-img"> 
                <a href="{{route('show', $tip->id) }}">
                    <img src="http://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ $tip->image }}" class="w-100 h-100">
                    <div class="title">
                    <p>{{$tip->title}}</p>

                    </div>
                </a>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


<!--Style-->
<style>
    .card-img{
        max-width:350px;
        max-height: 350px;
    }
</style>