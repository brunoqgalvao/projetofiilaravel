 <!-- ref: https://www.codeseek.co/danbhala/bootstrap-fullscreen-menu-via-modal-EKoNrO -->

 <style>
   .modal-fullscreen-menu {
     background-color: rgba(255, 255, 255, 0.90);
   }

   .modal-fullscreen-menu .close {
     color: white;
     opacity: 1;
     padding: 10px;
     position: absolute;
     top: 0;
     right: 0;
     z-index: 1;
     font-size: 4vh;
   }

   .modal-fullscreen-menu .modal-dialog {
     margin: 0 auto;
     width: 100%;
     max-width: 768px;
     display: flex;
     height: 100%;
     align-items: center;

   }

   .modal-fullscreen-menu .modal-content {
     background-color: transparent;
     box-shadow: none;
     border: none;
   }

   .modal-fullscreen-menu .list-group {
     text-align: center;
     margin: 0 auto;
     width: 100%;
   }

   .modal-fullscreen-menu .list-group a {
     font-size: 200%;
     font-weight: 200;
     letter-spacing: 0.05em;
     border: none;
     transition: all 0.25s ease;
     background-color: transparent;
     color: black;
     padding: 7.5vh 0;
     height: 3vh;
     font-size: 3vh;
     line-height: 0;
     z-index: 10;
   }

   .modal-fullscreen-menu .list-group a:before {
     content: '';
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     z-index: -1;
     opacity: 0;
     transform: scale3d(0.7, 1, 1);
     transition: transform 0.4s, opacity 0.4s;
   }

   .modal-fullscreen-menu .list-group a:hover {
     color: var(--verde);
   }

   .modal-fullscreen-menu .list-group a:hover:before {
     transform: translate3d(0, 0, 0);
     opacity: 1;
   }

   .modal-backdrop.in {
     opacity: 1;
   }
 </style>


 <div class='modal fade modal-fullscreen-menu' id='modalNavigation' role='dialog' tabindex='-1'>
   <button aria-label='Close' class='close' data-dismiss='modal' type='button'>
     <span class='sr-only'>Close navigation</span>
     <span class='glyphicon glyphicon-remove'></span>
   </button>
   <div class='modal-dialog'>
     <div class='modal-content'>
       <nav class='list-group'>
        <a class='list-group-item' href="/feed/{{ Auth::user()->name }}">       {{ Auth::user()->name }}
        </a>
         <a class='list-group-item' href='/feed'>Página Inicial</a>
         <a class='list-group-item' href='/user/edit/{{Auth::user()->id}}'>Gerenciar perfil</a>
         <a class='list-group-item' href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
           Sair
         </a>
         <a class='list-group-item' href='#'>Contato</a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           {{ csrf_field() }}
         </form>
       </nav>
     </div>
   </div>
 </div>