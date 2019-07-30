@extends('layout.template')
<?php

//TODO: Solve this
$user = Auth::user();
$user->credentials = 'Banco de investimentos';
?>

@section('content')
  @include('feed.newPost')
  @foreach($posts as $post)
    @include('feed.post', ['post' => $post])
  @endforeach
@endsection
