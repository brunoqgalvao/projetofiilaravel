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

<div>
  <ul id='suggested-rooms' >
  </ul>
</div>


<script>

  addItem = function(item) {
    const newItem = document.createElement('li');
    newItem.innerHTML = `<a href="/feed/${item}">#${item}</a>`;
    $('#suggested-rooms')[0].appendChild(newItem);
    console.log('here');
  }
  $(document).ready(function () {
    console.log('getting rooms');
    $.get('/api/rooms', function(data) {
      data.forEach( (room) => {
        console.log(room);
        addItem(room.name);
      })
    })
  });
</script>