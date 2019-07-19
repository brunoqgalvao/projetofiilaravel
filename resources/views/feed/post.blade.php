<div class="col-md-6 col-sm-8 mx-auto my-2 py-2" style="background:white">
  <div class="row">
    <div class="col-sm-1 d-flex align-middle">
      <a href="#" class=' align-self-center'>
        <img src="./assets/{{$post['user']['user_avatar']}}" width="40" height="40" alt="...">
      </a>
    </div>
    <div class="col-sm-8 ml-2 mt-2">
      <a href="#" class="anchor-username">
        <h4 class="media-heading mb-0">{{$post['user']['name']}}</h4>
        <small class='text-sm-left'>{{$post['user']['credentials']}}</small>
      </a>
    </div>
  </div>
  <section class='row'>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-11">
      {{$post['conteudo']}}
    </div>
    <div class="col-sm-1">
      </div>
    <div class='col-sm-11'>
      <div class='bg-container' style="height:200px">
        <div class='bg  rounded border my-2' style="background-image:url('assets/itau_banner.jpg')"></div>
      </div>
    </div>
  </section>
    <div class='row'>
      <div class="col-sm-1">
      </div>
      <div class='col-sm-11 d-flex'>
          <ul class="list-unstyled d-flex justify-content-center">
              <li class='mx-3 my-2'>
                  <a href="#">
                    <i class="fa fa-comment"  style="color:var(--verde)"></i> 
                    {{$post['comments_total']}}
                  </a>
                </li>
              <li class='mx-3 my-2'>
                <a href="#">
                    <i class="fa fa-thumbs-up" style="color:var(--verde)"></i>
                    {{$post['likes_total']}}
                </a>
              </li>
              <li class='mx-3 my-2'>
                <a href="#">
                  <i class="fa fa-share"  style="color:var(--verde)"></i> 
                  {{$post['shares_total']}}
                </a>
              </li>
            </ul>
      </div>
    </div>
</div>
</div>