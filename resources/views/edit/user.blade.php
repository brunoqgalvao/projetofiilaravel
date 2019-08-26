<div class="container">
    <div class="row justify-content-md-center">
        <fieldset class="m-3">
            <div class="text-center">
                <legend>Atualize seu cadastro</legend>
            </div>
            <form method="post" action="/user/update/{{Auth::user()->id}}" enctype="multipart/form-data" >
                {{csrf_field()}}
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <div class="form-group">
                    <div>
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" name="name" value={{$user->name}} />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value={{$user->email}} />
                </div>
                <div class="form-group">
                    <label for="">Senha:</label>
                    <input type="password" class="form-control" name="password" value="" />
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Senha:</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="user-avatar">Avatar:</label>
                    <input type="file" class="form-control-files" name="user_avatar" accept="image/png, image/jpeg" value={{$user->user_avatar}} />
                </div>
                <div class="form-group">
                    <div class="form-inline justify-content-between pb-3">
                        <a href="/feed" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                <div>
            </form>
        </fieldset>
    </div>
</div>