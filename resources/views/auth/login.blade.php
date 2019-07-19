<div class='login-form-title'>BEM VINDO AO PROJETO FII</div>
        <hr />
        <div class='btn-login-facebook text-center'>
          <a class="btn btn-lg btn-facebook" href="./">
            Entre com facebook
          </a>
        </div>
        <hr />
        <form  method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

          <div class="form-group">
            Email:
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            Senha:
            <input id="password" type="password" class="form-control" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <input type="submit" class="btn-submit" value="Login" />
          </div>
          <div class="form-group">
            <a id='login-forget-pwd' href="{{ route('password.request') }}">Esqueceu a senha?</a>
          </div>
        </form>