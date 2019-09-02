<?php 
//TODO: gambiarra php

$content = str_replace('&quot;', "'", $post->content);
$content = substr($content,1);
$content = substr($content,0,-1);
$content = str_replace('\\', "", $content);
$user = $post->postOwner->user;
$postId = $post->id;
?>

<div class="col-md-5 col-sm-8 mx-auto my-2 py-2" style="background:white">
  <div class="row">
    <div class="col-sm-1 d-flex" style="
    justify-content: center;
    margin-left: 10px;
">
    <a href="/feed/{{$user->name}}" class=' align-self-center'>
        <img class="rounded-circle"  src="{{$user->user_avatar}}" width="32" height="32" alt="...">
      </a>
    </div>
    <div class="col-sm-8 mt-2">
      <a href="/feed/{{$user->name}}" class="anchor-username">
        <h5 class="media-heading text-hover">{{$user->name}}</h5>
        <small class='text-sm-left'>{{$user->credentials}}</small>
        <span class="smaller light-grey">- {{$post->age }} atrás</span>
      </a>
    </div>
  </div>
  <section class='row'>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-11 post-content py-2"  style="word-break: break-all;">
      {!! $content !!}
    </div>
  </section>
  @if(strlen($post->image_url) > 10)
    <div class='row bg-container border-top border-bottom' id="post-img-container" style='min-height:200px; height:20%;'>
      <div class='bg' id="post-img-div" style="background-image:url('{{$post->image_url}}')"></div>
    </div>
    @endif
    <div class='row'>
      <div class='col-sm-12'>
          <ul class="list-unstyled d-flex py-1 pb-0 mb-0" style="justify-content:space-around;">
              <li class='mx-3'>
                  <a class="clickable" onclick="toggleLike({{$postId}})">
                      <i class="fa fa-thumbs-up icon-hover"></i>
                  <span class="small" id='likes-total-{{$postId}}'>{{$post['likes_count']}}</span>
                  </a>
                </li>
              <li class='mx-3'>
                  <a class="clickable" onclick="loadNWriteComments(event, {{$post->id}})" >
                      <i class="fa fa-comment icon-hover"></i> 
                      <span class="small">
                          {{$post['comments_total']}}
                      </span>
                  </a>
                </li>
 
              {{-- <li class='mx-3 my-2'>
                <a href="#">
                  <i class="fa fa-share"  style="color:var(--verde)"></i> 
                  {{$post['shares_total']}}
                </a>
              </li> --}}
            </ul>
      </div>
    </div>
    <div class='row border-top pt-2'>
    <div class="col-12" id="formComments-{{$postId}}">
      <div class="form-group col-sm-12 justify-content d-flex ">
        <img class="rounded-circle" src="{{asset(Auth::user()->user_avatar)}}" width="40px" height="40px" alt="...">
      <input type="text" id="commentInput{{$postId}}" class="form-control ml-2" name='commentBody' placeholder="Comente...">
        <button type='submit' value='enviar' class="btn" onclick="postComment({{$postId}})">
          <i class="fa fa-paper-plane mx-2 icon-hover"></i>  
        </button>
      </div>
    </div>
  </div>
    <section class='row' id="postComments-{{$post->id}}">
    </section>
  </div>