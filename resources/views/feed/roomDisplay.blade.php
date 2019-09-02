<style>
  .fixed-scroll {
    max-height: 90%;
    position: fixed;
    left:1.5%;
    top:99px;
    width: 22%;
  }
  #suggested-rooms {
    max-height: 90%;
    position: fixed;
    left:1%;
    top:26%;
    width:19%;
    overflow-y:auto;
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
  li {
    list-style: none;
  }
</style>
<div class="row d-none d-md-block ">
  <div class="mb-2 ml-2">
      <div class="fixed-scroll p-1 bg-white">
        <div class="form-group mt-1" style="text-align: -webkit-center;">
          <input type='text' id='roomFilter' class="form-control" onkeyup="renderList()" placeholder="Search" style="width: 95%;">
        </div>
        <div>
          <div class="m-2">
            <ul id='roomList'></ul>
          </div>
        </div>
      </div>
  </div>
</div>



<script>

  var roomList = [];

  renderItem = function(item) {
    const newItem = document.createElement('li');
    newItem.innerHTML = `
    <div class="row justify-content-between mb-1">
      <div class="col-8 align-self-center"
      <a href="/feed/${item}">#${item}</a>
      </div>
      <div class="mr-3">
      <button class="btn btn-sm button-hover">Seguir</button>
      </div>
    </div>
    `;
    $("button").click(()=>{
      $(this).removeClass("btn btn-sm button-hover").addClass("fa fa-check btn btn-sm green-check").text("");
    });
    $('#roomList')[0].appendChild(newItem);
  }

  renderList = function() {
    filter = $("#roomFilter").val().toLowerCase();
    filteredRoomList = roomList.filter(str => str.toLowerCase().includes(filter));
    $('#roomList')[0].innerHTML = '';
    filteredRoomList.forEach((item) => {
      renderItem(item);
    })
  }

  $(document).ready(function () {
    console.log('getting rooms');
    $.get('/api/rooms', function(data) {
      data.forEach( (room) => {
        roomList.push(room.name);
      })
    }).then(() => {
      renderList(roomList);
    })
  });
</script>