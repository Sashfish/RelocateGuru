@extends('layouts.app')

@section('content')

   <div class="container col-md-8 col-md-offset-2">
       <div class="well well bs-component">
         <form class="form-horizontal" method="post" enctype='multipart/form-data'>
           @foreach ($errors->all() as $error)
           <p class="alert alert-danger">{{$error}}</p>
           @endforeach
           @if(session('status'))
            <div class="alert alert-success">
              {{session('status')}}
            </div>
            @endif
            <input type="hidden" name="_token" value="{!! csrf_token()!!}">
            <fieldset>
              <legend>Profile Settings</legend>
              <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$user->name}}">
                </div>
                <label for="title" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{$user->email}}">
                </div>
                <div class="col-lg-10">
                <b><p class="w3-left w3-left-align">Current Avatar:</p></b><img src="https://relocateguruapp.s3.eu-west-2.amazonaws.com/{{ Auth::user()->avatar }}" class="w3-left w3-circle w3-margin-right w3-left-align" style="width:60px">
                <p class="w3-left w3-left-align">Upload a new avatar</p>
              </div>
                <div class="col-lg-10">
                  <input type="file" class="form-control" name="image" id="image"/>
                </div>
              </div>
              <div class="col-1g-10 col-lg-offset-2">
                <form action='/home'>
                  <button type="submit" class="btn btn_default">Cancel</button>
                </form>
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
            </fieldset>
          </form>
          <button data-toggle="collapse" data-target="#call_content" class="btn btn-info">Delete Your Profile</button>
        </div>
      </div>




      <div class="collapse" id="call_content">
        <div class="d-flex">
          <div class="pr-4">
            <form action='/home/deleteuser'>
              <button type="submit" class="w3-button w3-block w3-theme-l1 w3-left-align" onclick="if (!confirm('Are you sure you want to delete this account permanently?')) { return false }">Press to confirm profile deletion. This is permanent!</button>
            </form>
          </div>
        </div>
      </div>
      @endsection
