@extends('layout.template')
<?php
//TODO: Solve this
$user = Auth::user();
?>

@section('content')
  @include('feed.newPost')
  @include('feed.postSettings')
  @foreach($posts as $post)
    @include('feed.post', ['post' => $post])
  @endforeach
@endsection
