
<div class="col-md-6 col-sm-8 mx-auto my-2 py-2 rounded" style="background:white">

<div class='row bg-container mb-2' style='height:100px'>
  <!-- img de fundo -->
  @if($room['banner'] != "")
  <div class='bg' style="background-image:url('{{$room["banner"]}}')"></div>
  @endif
  <!-- foto e perfil e nome -->
  <div class="col-12 d-flex all-center">
      @if($room['avatar'] != "")
    <div class='row d-flex align-items-end'>
        <div class="avatar-container">
          <img style="height:80px;width:80px" src="{{$room['avatar']}}" alt="...." class="avatar-img">
        </div>
    </div>
    <h4 class='text align-center'>
        {{strtoupper($room['name'])}}
      </h4>
    @else
      <h2 class='text align-center border-info' style='color:var(--verde)'>
        {{strtoupper($room['name'])}}
      </h2>
      @endif
    </div>
  </div>
</div>
</div>
</div>