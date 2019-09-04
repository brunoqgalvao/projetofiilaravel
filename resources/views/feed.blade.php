@extends('layout.template')
<?php

//TODO: Solve this
$user = Auth::user();
?>
@section('content')
  @if(isset($room))
    @if($room['isFund'])
      @include('feed.fundBanner')
    @else
      @include('feed.banner')
    @endif
  @endif  
  @include('feed.newPost')
  <div id='post-container' style='min-height:65vh;'>
    <div class="infinite-scroll">
      @include('feed.postSettings')
      @foreach($posts as $post)
        @include('feed.post', ['post' => $post])
      @endforeach
      <div class='d-none'>
      {{$posts->links()}}
      </div>
    </div>
  </div>
  @include('feed.roomDisplay')
@endsection
