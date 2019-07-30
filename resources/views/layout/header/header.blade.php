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
      <button type="button" class="btn btn-padrao btn-small" data-toggle="modal" data-target="#modalCadastrar">
        CADASTRO
      </button>
    </div>
    <button type="button" class="btn btn-login btn-small" data-toggle="modal" data-target="#modalLogin">
      ENTRAR
    </button>

    @include('auth.modalCadastrar')
    @include('auth.modalLogin')

  </div>
</header>
@else
<header>
  <div class='logo-container'>
    <a href="./index.php" class="logo-container-link"></a>
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