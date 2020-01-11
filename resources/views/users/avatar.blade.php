@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <img src="/uploads/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
<h2>{{Auth::user()->name}}'s profile</h2>
</div>
</div>
</div>
    @endsection
