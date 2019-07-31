<?php 
//TODO: gambiarra php

$content = str_replace('"', "", $post->content);
$user = $post->postOwner->user;
?>

<div class="col-md-6 col-sm-8 mx-auto my-2 py-2" style="background:white">
  <div class="row">
    <div class="col-sm-1 d-flex align-middle">
      <a href="#" class=' align-self-center'>
        <img src="./assets/{{$user->user_avatar}}" width="32" height="32" alt="...">
      </a>
    </div>
    <div class="col-sm-8 mt-2">
      <a href="#" class="anchor-username">
        <h4 class="media-heading mb-0">{{$user->name}}</h4>
        <small class='text-sm-left'>{{$user->credentials}}</small>
      </a>
    </div>
  </div>
  <section class='row'>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-11">
      {!!$content!!}
    </div>
    @if($post->image_url)
    <div class="col-sm-1">
      </div>
    <div class='col-sm-11'>
      <div class='bg-container' style="height:200px">
        <div class='bg  rounded border my-2' style="background-image:url('assets/{{$post->image_url}}')"></div>
      </div>
    </div>
    @endif
  </section>
    <div class='row'>
      <div class="col-sm-1">
      </div>
      <div class='col-sm-11 d-flex'>
          <ul class="list-unstyled d-flex justify-content-center">
              <li class='mx-3 my-2'>
                  <a href="#" onclick="loadNWriteComments()">
                    <i class="fa fa-comment"  style="color:var(--verde)"></i> 
                    {{$post['comments_total']}}
                  </a>
                </li>
              <li class='mx-3 my-2'>
                <a href="#">
                    <i class="fa fa-thumbs-up" style="color:var(--verde)"></i>
                    {{$post['likes_total']}}
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
    <section class='row'>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11" id="showComment">
        </div>
</div>
</div>
<script>
  function loadNWriteComments() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("showComment").innerHTML = this.responseText;
      }
    }
  xhttp.open("GET", "", true);
  xhttp.send();
  }
  
</script>