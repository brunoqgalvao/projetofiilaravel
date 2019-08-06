<?php 
//TODO: gambiarra php

$content = str_replace('&quot;', "'", $post->content);
$content = substr($content,1);
$content = substr($content,0,-1);
$content = str_replace('\\', "", $content);
$user = $post->postOwner->user;
$postId = $post->id;
?>

<style>

.post-content > p > img {
  max-width:90%;
  max-height:90%;
}

.hidden {
  display:none;
}

</style>

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
                  <a href="#" onclick="loadNWriteComments(event, {{$post->id}})">
                    <i class="fa fa-comment"  style="color:var(--verde)"></i> 
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
        <img src="{{$user->user_avatar}}" width="32" height="32" alt="...">
        <input type="text" class="form-control ml-2" name='commentBody' placeholder="Comente...">
        <button type='submit' value='enviar' class="btn-md ml-2">
          <i class="fa fa-paper-plane mx-2"></i>  
        </button>
      </div>
    </form>
    <section class='row' id="postComments-{{$post->id}}">
    </section>
  </div>
<script>

  // load comentarios;
  function loadNWriteComments(event, id) {
    event.preventDefault();
    // Check if comments for this post have alredy been loaded
    commentSection = document.getElementById("postComments-"+id);
    if(commentSection.getAttribute('showing')){
      excludeCommentSection(commentSection);
      commentSection.removeAttribute('showing');
      $("#formComments-"+id).toggle();
    } else {
      $.get("/comment/"+id, function(data,status) {
        writeCommentSection(data,commentSection);
        commentSection.setAttribute('showing',true);
        $("#formComments-"+id).toggle();
      })
    }
    // If they have, 

  }

  function excludeCommentSection(id) {
    //empty comments;
    commentSection.innerHTML="";
  }

  // abre ou fecha a seção de comentarios;
  function writeCommentSection(comments,commentSection) {
    comments.forEach(comment => {
        var commentDiv = buildCommentDiv(comment);
        commentSection.appendChild(commentDiv);
      });
  }


  // constroi uma div de comentario a partir do comment vindo do banco;
  function buildCommentDiv(comment){
    commentDiv = document.createElement('div');
    commentDiv.setAttribute("id", comment.id);
    commentDiv.setAttribute("class", "col-sm-12");
    commentDiv.innerHTML = `
    <div class="col-sm-1">
      </div>
      <div class="col-sm-11 d-flex" id="showComment{{$postId}}">
        <div class="col-sm-1 d-flex align-middle">
            <a href="#" class='align-self-center'>
              <img src="{{$user->user_avatar}}" width="32" height="32" alt="...">
            </a>
        </div>
        <div class="col-sm-8 ml-2 mt-2 d-flex bg-light-grey">
        <p style="word-break: break-all">
          <a href="/feed/${comment.user.name}" class="anchor-username font-weight-bold">
            ${comment.user.name}
          </a>
          ${comment.body}
        </p>
        </div>
    </div>

    `
    return commentDiv;
  }

</script>

<script>
// like logic

var toggleLike = function (postId) {
  var token = $("meta[name = 'csrf-token']").val();
  $.ajax({
    url : '/api/like',
    type : 'post',
    data : {
        token : '{{csrf_token()}}',
        'postId' : postId
    },
    success : function(res){
      console.log(res)
        document.querySelector(`#likes-total-${postId}`).innerHTML=res.likes_total;
        console.log(res.likes_total);
    }
  });
};
</script>