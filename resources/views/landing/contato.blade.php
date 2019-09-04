<!-- This is the contato form -->
<!-- TODO:
  - fazer form passando por varios steps via javascript
-->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 col-md-5">
      <fieldset class=" mt-auto">
        <div class="text-center">
        <legend>CONTATE-NOS</legend>
        </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nome">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Seu email">
          </div>
          <div class="form-group">
            <textarea name="comentario" class ="form-control" cols="8" rows="10" placeholder="Comentários e sugestões"></textarea>
          </div>
          <div class="form-group">
            <div class="form-inline justify-content-between pb-3">
              <div class="form-check ml-0 w-auto">
                <input type="checkbox" class="form-check-input" id="postarNome">
                <label class="form-check-label" for="postarNome">Não postar meu nome</label>
              </div>
                <button class="btn btn-primary" onclick='modalAlertwithTitleAndText("PROJETO FII","Obrigado pelo contato!")'>Submit</button> 
            </div>
          </div>
      </fieldset>
    </div>
  </div>
</div>
