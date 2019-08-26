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
  <input type='text' id='filterRooms'>
  <ul >
  </ul>
</div>


<script>

  var roomList = [];

  addItem = function(item) {
    roomList.push(item);
  }

  renderItem = function(item) {
    const newItem = document.createElement('li');
    newItem.innerHTML = `<a href="/feed/${item}">#${item}</a>`;
    $('#suggested-rooms')[0].appendChild(newItem);
  }

  renderList = function(list) {
    list.forEach((item) => {
      renderItem(item);
    })
  }

  $(document).ready(function () {
    console.log('getting rooms');
    $.get('/api/rooms', function(data) {
      data.forEach( (room) => {
        console.log(room);
        addItem(room.name);
      })
    }).then(() => {
      renderList(roomList);
    })
  });
</script>