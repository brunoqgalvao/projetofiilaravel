@extends('layout.template')

@section('content')
<div class="container" style="height: 67.2vh">
    <div class="row justify-content-center mt-5">
        <fieldset class="m-3">
            <div class="text-center">
                <legend>Resetar Senha</legend>
            </div>
            <div class="panel-body mt-5">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{csrf_field()}}
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email:</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite seu email" style="width:25vw" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <div style="text-align:end">
                            <button type="submit" class="btn btn-primary">
                                Resetar Senha
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </fieldset>
    </div>
</div>
@endsection
