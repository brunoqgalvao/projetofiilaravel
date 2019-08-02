<?php 
//TODO: gambiarra php

$content = str_replace('"', "", $post->content);
$content = str_replace('\\', "", $content);
$user = $post->postOwner->user;
$postId = $post->id;
?>

<style>

.post-content > p > img {
  max-width:90%;
  max-height:90%;
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
      {!!$content!!}
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
    <section class='row' id="postComments-{{$post->id}}">
    </section>
</div>
</div>
<script>

  // load comentarios;
  function loadNWriteComments(event, id) {
    event.preventDefault();
    // Check if comments for this post have alredy been loaded
    commentSection = document.getElementById("postComments-"+id);
    console.log(commentSection.getAttribute('showing')===true);
    if(commentSection.getAttribute('showing')){
      excludeCommentSection(commentSection);
      commentSection.removeAttribute('showing')
    } else {
      console.log('here');
      $.get("/api/comment/teste", function(data,status) {
        writeCommentSection(data.comments,commentSection);
        commentSection.setAttribute('showing',true)
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
      <div class="col-sm-11" id="showComment{{$postId}}">
        <div class="col-sm-1 d-flex align-middle">
            <a href="#" class=' align-self-center'>
                <img src="" width="32" height="32" alt="...">
            </a>
        </div>
        <div class="col-sm-8 mt-2">
        <a href="#" class="anchor-username">
                ${comment.user_name}
        </a>
        <p>${comment.text}</p>
        </div>
    </div>

    `
    return commentDiv;
  }

</script>