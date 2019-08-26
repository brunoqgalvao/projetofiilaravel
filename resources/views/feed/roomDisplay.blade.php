<style>
  #suggested-rooms {
    position:fixed;
    left:16px;
    top:20%;
  }
  li {
    list-style: none;
  }
</style>

<div id='suggested-rooms'>
  <input type='text' id='roomFilter' onkeyup="renderList()">
  <ul id='roomList'>
  </ul>
</div>


<script>

  var roomList = [];

  renderItem = function(item) {
    const newItem = document.createElement('li');
    newItem.innerHTML = `<a href="/feed/${item}">#${item}</a>`;
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