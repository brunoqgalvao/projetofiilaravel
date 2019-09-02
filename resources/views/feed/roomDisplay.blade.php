<style>
  .fixed-scroll {
    max-height: 90%;
    position: fixed;
    left:1.5%;
    top:99px;
    width: 22%;
  }
  #suggested-rooms {
    max-height: 50vh;
    overflow-y:auto;
    overflow-x: hidden;
    -webkit-overflow-scrolling: touch;
  }

  .button-hover:hover {
    background-color:var(--verde);
    color: white;
  }
  .button-hover {
    background-color:grey;
    color: white;
  }

  .green-check {
    color:var(--verde);
  }

  .style-scroll::-webkit-scrollbar-track {
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
	background-color: #F5F5F5;
	border-radius: 10px;
  }

  .style-scroll::-webkit-scrollbar {
	width: 10px;
	background-color: #F5F5F5;
  }

.style-scroll::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	background-color: #FFF;
  background-image: 
  -webkit-gradient(linear,
  40% 0%,
  75% 84%,
  from(#158891),
  to(#158891),
  color-stop(.6,#DDDDDD))
}

  li {
    list-style: none;
  }
</style>
<div class="row d-none d-md-block ">
  <div class="mb-2 ml-2 fixed-scroll bg-white">
      <div class="p-1 bg-white">
        <div class="form-group mt-1" style="text-align: -webkit-center;">
          <input type='text' id='roomFilter' class="form-control" onkeyup="renderList()" placeholder="Search" style="width: 95%;">
        </div>
        <div class="style-scroll" id="suggested-rooms">
          <div class="m-2">
            <ul id='roomList'></ul>
          </div>
        </div>
      </div>
  </div>
</div>



<script>

  var roomList = [];

  var followButton = (id) => `<button class="btn btn-sm button-hover" id="follow-room-${id}" onclick="toggleFollow(${id})">Seguir</button>` ;
  var unfollowButton = (id) => `<button class="btn btn-sm" id="follow-room-${id}" onclick="toggleFollow(${id})"><i class="fa fa-check green-check"></i></button>` ;

  var toggleFollow = function (roomId) {
  var token = $("meta[name = 'csrf-token']").val();
  $.ajax({
    url : '/api/follow',
    type : 'post',
    data : {
        token : '{{csrf_token()}}',
        'roomId' : roomId
    },
    success : function(res){
      if(res.liked){
        $(`#follow-room-${roomId}`).removeClass('button-hover').html(`<i class="fa fa-check green-check">`);
      } else {
        $(`#follow-room-${roomId}`).addClass('button-hover').html('Seguir');
      }
    }
  });
}

  renderItem = function(item) {

    const { name , id, followed_by_auth_user } = item;
    const newItem = document.createElement('li');
    console.log(followButton(id));
      newItem.innerHTML = (`
    <div class="row justify-content-between mb-1">
      <div class="col-8 align-self-center"
      <a href="/feed/${name}">#${name}</a>
      </div>
      <div class="mr-3">`) 
      + (followed_by_auth_user?unfollowButton(id):followButton(id)) 
      + `</div>
    </div>
    `;
    console.log(newItem.innerHTML);
    $('#roomList')[0].appendChild(newItem);
  }

  renderList = function() {
    filter = $("#roomFilter").val().toLowerCase();
    filteredRoomList = roomList.filter(str => str.name.toLowerCase().includes(filter));
    $('#roomList')[0].innerHTML = '';
    filteredRoomList.forEach((item) => {
      renderItem(item);
    })
  }

  $(document).ready(function () {
    $.get('/api/rooms', function(data) {
      data.forEach( (room) => {
        roomList.push(room);
      })
    }).then(() => {
      renderList(roomList);
    })
  });
</script>