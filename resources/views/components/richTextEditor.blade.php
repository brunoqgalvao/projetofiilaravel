<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">

<div class='row bg-container mb-2 hidden' id="post-img-container" style='height:300px'>
  <div class='bg' id="post-img-div" style="background-image:url('')"></div>
    <i class='fa fa-times' style="position:absolute; top:5px; right:5px; z-index:150;" onclick="removeImage()"></i>
  </div>
<div class="row" >
<div class="col-1 pt-1">
  <a href="#">
    <img  class="rounded-circle" src="{{$user['user_avatar']}}" width="32" height="32" alt="...">
  </a>
</div>
<div class='col-10 mx-auto'>
  <div class='rounded'>
    <div id="editor" class='rounded py-0' style="background:white">
    </div>
  </div>
  <div id="toolbar" class="" style="display:none;border:none;">
    <button class="ql-bold">Bold</button>
    <button class="ql-italic">Italic</button>
    <button class="ql-image">Image</button>
  </div>
</div>
<div class='col-1 d-flex mx-0 pl-0'>
<form method='post' action="{{ url('/post') }}" onSubmit="return formSubmit()">
  {{csrf_field()}}
  <input type='text' class='d-none' id='postContent' name='postContent' value=""/>
  @if(isset($room['name']))
<input type='text' class='d-none' id='roomName' name='roomName' value="{{$room['name']}}"/>
  @endif
<input type='text' class='d-none' id='postImg' name='postImg' value=""/>
  <button id='quill-send' class='btn px-0 align-self-start pt-2'>
      <i class="fa fa-paper-plane icon-hover"></i>
    </button>
  </form>
</div>
</div>





<script>

const hashValues = [];

$(document).ready(()=>{
  fetch("/api/rooms")
    .then(res => res.json())
    .then(rooms => rooms.forEach(room => hashValues.push({id:room.id,value:room.name,link:`/feed/${room.name}`})))
});

  // create quill
  var quill = new Quill('#editor', {
    modules: {
      toolbar: '#toolbar',
      mention: {
          allowedChars: /^[A-Za-z\sÅÄÖåäö]*$/,
          mentionDenotationChars: ["#"],
          dataAttributes: ['id','value','link'],
          source: function (searchTerm, renderList, mentionChar) {
            let values;
 
            if (mentionChar === "@") {
              values = atValues;
            } else {
              values = hashValues;
            }
 
            if (searchTerm.length === 0) {
              renderList(values, searchTerm);
            } else {
              const matches = [];
              for (i = 0; i < values.length; i++)
                if (~values[i].value.toLowerCase().indexOf(searchTerm.toLowerCase())) matches.push(values[i]);
              renderList(matches, searchTerm);
            }
          },
        },
    },
    theme: 'snow',
    placeholder: 'O que você está pensando?'
  });

  

  
  // toggle toolbar
  quill.on('selection-change', function (range, oldRange, source) {
    if (range) {
      $('#toolbar').toggle(true)
      if (range.length == 0) {} else {
        var text = quill.getText(range.index, range.length);
      }
    } else $('#toolbar').toggle(false)
  });

  // send post
function formSubmit() {
  var postContent = document.querySelector('#postContent');
  postContent.value = JSON.stringify(quill.root.innerHTML);
  return true;
};

function selectLocalImage() {
      const input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.click();

      // Listen upload local image and save to server
      input.onchange = () => {
        const file = input.files[0];

        // file type is only image.
        if (/^image\//.test(file.type)) {
          saveToServerAndInsertOutsideEditor(file);
        } else {
          console.warn('Você só pode subir imagens');
        }
      };
    }

    /**
     * Step2. save to server
     *
     * @param {File} file
     */
    function saveToServerAndInsertOutsideEditor(file) {
      const data = new FormData();
      const request = new XMLHttpRequest();
      data.append('image', file);
      console.log(data);
      token = document.querySelector('meta[name="csrf-token"]').content;
      request.open('POST', 'http://localhost:8000/api/upload/image', true);
      request.setRequestHeader('X-CSRF-TOKEN', token);
      request.onload = () => {
        if (request.status === 200) {
          // this is callback data: url
          const url = JSON.parse(request.responseText).data;
          insertOutsideEditor(url);
        }
      };
      request.send(data);
    }

    /**
     * Step3. insert image url to rich editor.
     *
     * @param {string} url
     */

    function insertOutsideEditor(imageUrl) {
      removeImage();
      var fullUrl = `http://localhost:8000${imageUrl}`
      $('#post-img-container').toggle(true)
      $('#post-img-div').css('background-image', `url("http://localhost:8000${imageUrl}")`);
      $('#postImg').val(fullUrl);
    }

    function removeImage() {
      $('#post-img-container').toggle(false)
      $('#post-img-div').css('background-image', `url("")`);
      $('#postImg').val('');
    }

    function insertToEditor(url) {
      // push image url to rich editor.
      const range = quill.getSelection();
      quill.insertEmbed(range.index, 'image', `http://localhost:8000${url}`);
    }

    // quill editor add image handler
    quill.getModule('toolbar').addHandler('image', () => {
      selectLocalImage();
    });
</script>