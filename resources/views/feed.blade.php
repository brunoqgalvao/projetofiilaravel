@extends('layout.template')
<?php

//TODO: Solve this
$user = Auth::user();
?>
@section('content')
  @if(isset($room))  
    @include('feed.banner')
  @endif
  @include('feed.newPost')
  @include('feed.postSettings')
  @foreach($posts as $post)
    @include('feed.post', ['post' => $post])
  @endforeach
    @include('feed.roomDisplay')
@endsection
