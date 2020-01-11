@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="http://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ $tip->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="http://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ $tip->user['avatar'] }}" class="rounded-circle w-100" style="max-width: 40px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $tip->user->id }}">
                                <span class="text-dark">{{ $tip->user['name'] }}</span>
                            </a>
                            <a href="#" class="pl-3">Follow</a>
                        </div>
                    </div>
                </div>

                <hr />
                    <p><h1>{{$tip->title}}</h1></p>
                <hr />
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $tip->user->id }}">
                            <span class="text-dark">{{ $tip->user['name'] }}</span>
                        </a>
                    </span> {{ $tip->description }}
                </p>

                <p> <img src="https://img.icons8.com/ios-glyphs/30/000000/user-location.png"> | {{$tip->city['name']}} <p>
            </div>

            
        </div>
    </div>
</div>
@endsection