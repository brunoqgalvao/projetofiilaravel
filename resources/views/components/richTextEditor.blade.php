<!-- Include Quill stylesheet -->
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">

<div class="col-sm-1 pt-1">
  <a href="#">
    <img  src="./assets/{{$user['user_avatar']}}" width="32" height="32" alt="...">
  </a>
</div>
<div class='col-sm-10 mx-auto'>
  <div class='rounded'>
    <div id="editor" class='rounded py-0' style="background:white">
      <small>O que você está pensando?</small>
    </div>
  </div>
  <div id="toolbar" class="" style="display:none;border:none;">
    <button class="ql-bold">Bold</button>
    <button class="ql-italic">Italic</button>
    <button class="ql-image">Image</button>
  </div>
</div>
<div class='col-sm-1 d-flex mx-0 pl-0'>
<form method='post' action="{{ url('/post') }}" onSubmit="return formSubmit()">
  {{csrf_field()}}
  <input type='text' class='d-none' id='postContent' name='postContent' value=""/>
  <button id='quill-send' class='btn px-0 align-self-start pt-2'>
      <i class="fa fa-paper-plane"></i>
    </button>
  </form>
</div>


<!-- Include the Quill library -->
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>

  // create quill
  var quill = new Quill('#editor', {
    modules: {
      toolbar: '#toolbar'
    },
    theme: 'snow'
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

  // var toolbarOptions = [
//     ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
//     ['blockquote', 'code-block'],

//     [{ 'header': 1 }, { 'header': 2 }],               // custom button values
//     [{ 'list': 'ordered'}, { 'list': 'bullet' }],
//     [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
//     [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
//     [{ 'direction': 'rtl' }],                         // text direction

//     [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
//     [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
//     [ 'link', 'image', 'video', 'formula' ],          // add's image support
//     [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
//     [{ 'font': [] }],
//     [{ 'align': [] }],

//     ['clean']                                         // remove formatting button
// ];
</script>