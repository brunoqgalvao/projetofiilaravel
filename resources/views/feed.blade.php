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
  <div id='post-container'>
  @include('feed.postSettings')
  @foreach($posts as $post)
    @include('feed.post', ['post' => $post])
  @endforeach
  </div>
    @include('feed.roomDisplay')
@endsection
