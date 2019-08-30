<style>

  .post-content > p > img {
    max-width:90%;
    max-height:90%;
  }
  
  .hidden {
    display:none;
  }
  
  </style>

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
      <div class="col-sm-11 d-flex" id="showComment">
        <div class="col-sm-1 d-flex align-middle">
            <a href="#" class='align-self-center'>
              <img src="${comment.user.user_avatar}" width="32" height="32" alt="...">
            </a>
        </div>
        <div class="col-sm-8 col-md-11 ml-2 mt-2 d-flex bg-light-grey">
          <p style="word-break: break-all">
            <a href="/feed/${comment.user.name}" class="anchor-username font-weight-bold">
              ${comment.user.name}
            </a>
            ${comment.body}
          </p>
        </div>
    </div>
    <div class="container">
      <div class="justify-content-beetween">
        <div class="row col-6">
            <a href="#" class='align-self-center' onclick="toggleLikeComment(${comment.id})"> Curtir </a> 
            <a href="#" class='align-self-center ml-2'> Responder </a>
        </div>
        <div class="row col-4">
            
            <span id='comment-likes-total-${comment.id}'>${comment.likes_total}</span>
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
var toggleLikeComment = function (commentId,event) {
  event.preventDefault();
  var token = $("meta[name = 'csrf-token']").val();
  $.ajax({
    url : '/api/like/comment',
    type : 'post',
    data : {
        token : '{{csrf_token()}}',
        'commentId' : commentId
    },
    success : function(res){
      console.log(res)
        document.querySelector(`#comment-likes-total-${commentId}`).innerHTML=res.likes_total;
        console.log(res.likes_total);
    }
  });
};

console.log('teste')
</script>