<!-- Include Quill stylesheet -->
{{-- <script src={{ URL::asset("/js/quill.min.js") }}></script> --}}
<!-- Include the Quill library -->
{{-- <script src="//cdn.quilljs.com/1.3.6/quill.js"></script> --}}
{{-- <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> --}}
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">


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
  <button id='quill-send' class='btn px-0 align-self-start pt-2'>
      <i class="fa fa-paper-plane icon-hover"></i>
    </button>
  </form>
</div>




<script>

const hashValues = [];

$(document).ready(()=>{
  fetch("/api/rooms")
    .then(res => res.json())
    .then(rooms => rooms.forEach(room => hashValues.push({id:room.id,value:room.name,link:`/feed/${room.name}`})))
});

// var bindings = {
//   enter: {
//     key: 'enter',
//     handler: function() {
//       (#quill-send);
//     }
//   };

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
          saveToServer(file);
        } else {
          console.warn('You could only upload images.');
        }
      };
    }

    /**
     * Step2. save to server
     *
     * @param {File} file
     */
    function saveToServer(file) {
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
          insertToEditor(url);
        }
      };
      request.send(data);
    }

    /**
     * Step3. insert image url to rich editor.
     *
     * @param {string} url
     */
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

<script>

// quill.on('text-change', function(delta, oldDelta, source) {
//   if (source == 'api') {
//     console.log("An API call triggered this change.");
//   } else if (source == 'user') {
//     text = quill.getText();
//     editorFunctions(text,delta);
//     }
// });

// function editorFunctions(text,delta) {
//   text = quill.getText();
//   hashtags = /\B#\w+/igm
//   var counter =0;
//   htmlText = quill.container.innerHTML;
//   if(htmlText.match(hashtags)){
//     newHtmlText = htmlText.replace(hashtags, function($0) {
//       return '<b>'+ $0 + '</b>';
//     })
//     quill.container.innerHTML = newHtmlText;
//   }


// }


</script>