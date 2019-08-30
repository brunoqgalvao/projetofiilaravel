<style>

  .post-content > p > img {
    max-width:90%;
    max-height:90%;
  }
  
  .hidden {
    display:none;
  }

  .comment-like {
    position: absolute;
    right: 25px;
    bottom: 10px;
    z-index:100;
  }

  .row-full-width {
    width:100%;
  }

  .icon-hover:hover {
    color:var(--verde);
  }
  .icon-hover {
    color:grey;
  }
  .text-hover:hover {
    color:var(--verde);
  }

  .clickable {
    cursor:pointer;
  }
  </style>

<script>

  function postComment(postId) {
    var token = $("meta[name = 'csrf-token']").val();
    var commentBody = $(`#commentInput${postId}`).val();
    console.log(commentBody);
    $.ajax({
      url : `api/comment/${postId}`,
      type : 'post',
      data : {
          token : token,
          'commentBody' : commentBody
      },
      success : function(res){
        console.log(res)
          document.querySelector(`#likes-total-${postId}`).innerHTML=res.likes_total;
          console.log(res.likes_total);
    }
  });
  }

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
    <div class='row'>
    <div class="col-1">
     
    </div>
      <div class="col-11 d-flex" id="showComment">
      <div class='row mb-2 row-full-width'>
        <div class="col-1 d-flex align-left p-0" style="align-self:start; z-index:100;">
            <a href="/feed/${comment.user.name}" class='align-self-center'>
              <img class="rounded-circle" src="${comment.user.user_avatar}" width="40px" height="40px" alt="...">
            </a>
        </div>
        <div class="col-10 mt-2 bg-light-grey">
          <p class="small" style="word-break: break-all;">
            <a href="/feed/${comment.user.name}" class="anchor-username font-weight-bold mr-1">
              ${comment.user.name}
            </a>
            ${comment.body}
          </p>
        </div>
        <div class="comment-like"> 
          <a class="align-self-center clickable" onclick="toggleLikeComment(${comment.id})">
            <i class="fa fa-thumbs-up icon-hover"></i> 
            <span class="small" id='comment-likes-total-${comment.id}' style="color:var(--verde);">${comment.likes_total}</span>
          </a> 
        </div>
        </div>
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
var toggleLikeComment = function (commentId) {
  console.log(commentId);
  var token = $("meta[name = 'csrf-token']").val();
  $.ajax({
    url : '/api/like/comment',
    type : 'post',
    data : {
        token : '{{csrf_token()}}',
        'commentId' : commentId
    },
    success : function(res){
      console.log('ola')
      console.log(res)
        document.querySelector(`#comment-likes-total-${commentId}`).innerHTML=res.likes_total;
        console.log(res.likes_total);
    }
  });
};
</script>