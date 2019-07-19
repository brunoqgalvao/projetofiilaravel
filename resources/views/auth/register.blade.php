<div class='login-form-title'>CADASTRE-SE PROJETO FII</div>
  <hr/>
  <div class='btn-login-facebook text-center'>
    <a class="btn btn-lg btn-facebook" href="./">
      Cadastro com facebook
    </a>
  </div>
  <hr/>
  <form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div id="cadastro-nome">
      <div class="form-group">
        Email: 
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <button type="avancar" class="btn-submit" id='btn-avancar' onClick="avancarCadastro()">Cadastrar</button>
      </div>
    </div>
    <div id="cadastro-dados" style="display: none">
      <div class="form-group">
        Nome: 
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        Senha:
        <input id="password" type="password" class="form-control" name="password" required />
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group">
        Confirmar Senha: 
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      </div>
      <div class="form-group">
        <input type="submit" class="btn-submit" value="Cadastrar" />
      </div>
    </div>
    <div class="form-group">
      <a href="#" id='login-forget-pwd' data-toggle="modal" data-dismiss="modal" data-target="#modalLogin">Já tem cadastro?</a>
    </div>
  </form>

        
<!-- TODO: refatorar esse script para fora do arquivo -->
<!-- TODO: alinhar como será essa funcionalidade -->
<script>
  var btnForgetPwd = document.querySelector('#login-forget-pwd');
  btnForgetPwd.addEventListener('click',function(){
    alert('um email foi enviado ao seu ...');
  })
  btnForgetPwdParent = btnForgetPwd.parentNode;
  btnForgetPwdParent.appendChild()

  var node = document.createElement("LI");                 // Create a <li> node
var textnode = document.createTextNode("Water");         // Create a text node
node.appendChild(textnode);                              // Append the text to <li>
document.getElementById("myList").appendChild(node);     // Append <li> to <ul> with id="myList"

function avancarCadastro(){
  btnAvancar = document.querySelector("#btn-avancar");
  cadDados = document.querySelector("#cadastro-dados");
  btnAvancar.style.display = 'none';
  cadDados.style.display = 'block';

}

</script>