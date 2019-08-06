<!--  -->
<!-- FIXME: Mobile não está resolvido no header - vai ser CSS? -->

@if (Auth::guest())
 <?php
   // Get Login or Register Modal Status on Load
   $loginOpen = isset($_GET['login'])? true:false;
   $registerOpen = isset($_GET['register'])? true:false;
 ?>
<header>
  <div class='logo-container'>
    <a href="/" class="logo-container-link"></a>
    <div class="logo-container-logo-bg"></div>
    <span class="logo-container-title">projeto fii</span>
  </div>
  <div class="col-5 d-none d-md-block">
  </div>
  <div class='header-login-btns'>
    <div class="mb-2">
      <button id='register-button' type="button" class="btn btn-padrao btn-small">
        CADASTRO
      </button>
    </div>
    <button type="button" id='login-button' class="btn btn-login btn-small">
      ENTRAR
    </button>

    @include('auth.modalCadastrar')
    @include('auth.modalLogin')

  </div>
</header>
@else
<header>
  <div class='logo-container'>
    <a href="/" class="logo-container-link"></a>
    <div class="logo-container-logo-bg"></div>
    <span class="logo-container-title">projeto fii</span>
  </div>
  <!-- <form action="" class='search-box d-none d-sm-block'>
    <input type="search" name="" class="input-search" placeholder="Busque fundos de investimento...">
    <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
  </form> -->

  <div class='header-perfil-container my-2'>
    <div class="avatar-container">
      <a class="avatar-link" type="button" data-target='#modalNavigation' data-toggle='modal' id="perfil-link">
        <img src="{{ asset(Auth::user()->user_avatar) }}" alt="assets/empty-avatar.png" class="avatar-img">
      </a>
    </div>
  </div>
</header>
@include('layout.header.modalNavigation')

@endif

<script type="text/javascript">
  $('#login-button').on('click',function(){
      $('#modalLogin').modal('show');
      window.history.replaceState( {} , 'register' , '/?login');
  });
  $('#register-button').on('click',function(){
      $('#modalCadastrar').modal('show');
      window.history.replaceState( {} , 'register' , '/?register');
s  });
</script>