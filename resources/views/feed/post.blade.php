<?php 
//TODO: gambiarra php

$content = str_replace('&quot;', "'", $post->content);
$content = substr($content,1);
$content = substr($content,0,-1);
$content = str_replace('\\', "", $content);
$user = $post->postOwner->user;
$postId = $post->id;
?>

<div class="col-md-6 col-sm-8 mx-auto my-2 py-2" style="background:white">
  <div class="row">
    <div class="col-sm-1 d-flex align-middle">
    <a href="/feed/{{$user->name}}" class=' align-self-center'>
        <img src="{{$user->user_avatar}}" width="32" height="32" alt="...">
      </a>
    </div>
    <div class="col-sm-8 mt-2">
      <a href="/feed/{{$user->name}}" class="anchor-username">
        <h4 class="media-heading mb-0">{{$user->name}}</h4>
        <small class='text-sm-left'>{{$user->credentials}}</small>
      </a>
    </div>
  </div>
  <section class='row'>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-11 post-content">
      {!! $content !!}
    </div>
  </section>
    <div class='row'>
      <div class="col-sm-1">
      </div>
      <div class='col-sm-11 d-flex'>
          <ul class="list-unstyled d-flex justify-content-center">
              <li class='mx-3 my-2'>
                  <a href="#" onclick="loadNWriteComments(event, {{$post->id}})" >
                    <span class="change-icon">
                      <i class="fa fa-comment"  style="color:var(--verde)"></i> 
                      <i class="fa fa-comment-o"  style="color:var(--verde)"></i>
                    </span>
                    {{$post['comments_total']}}
                  </a>
                </li>
              <li class='mx-3 my-2'>
                <a href="#" onclick="toggleLike({{$postId}})">
                    <i class="fa fa-thumbs-up" style="color:var(--verde)"></i>
                <span id='likes-total-{{$postId}}'>{{$post['likes_count']}}</span>
                </a>
              </li>
              <li class='mx-3 my-2'>
                <a href="#">
                  <i class="fa fa-share"  style="color:var(--verde)"></i> 
                  {{$post['shares_total']}}
                </a>
              </li>
            </ul>
      </div>
    </div>
    <form id="formComments-{{$post->id}}" action='\comment\{{$postId}}' method='POST' class="col-10 hidden" >
        @csrf  
      <div class="form-group col-sm-12 justify-content d-flex">
        <img src="{{asset(Auth::user()->user_avatar)}}" width="32" height="32" alt="...">
        <input type="text" class="form-control ml-2" name='commentBody' placeholder="Comente...">
        <button type='submit' value='enviar' class="btn-md ml-2">
          <i class="fa fa-paper-plane mx-2"></i>  
        </button>
      </div>
    </form>
    <section class='row' id="postComments-{{$post->id}}">
    </section>
  </div>