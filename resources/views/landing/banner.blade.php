<!-- TODO:
  - fazer carousel com X divs - tem que ter no mínimo 3 ;
  - só aparacem as 3 divs centrais, e tem um parametro que controla aonde tá a "rolagem";
  - as divs intermediarias tem position relative e tamanho relative;
  - a div central é maior, z index maior;
  - dois botoes com position relative que tem transparency e aparecem no hover;
  - click no botao da esquerda gera uma animação para a esquerda e "load" dos items novos;
  - para a direita, a mesma coisa;
-->

<style>
  .banner {
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-content:space-around;

    height:40vh;
    width:100%;
    content: "";
    background:url(assets/skyline.jpg) no-repeat 0 0;
    background-size: cover;
    
  }
  .banner-search-box, .banner-btn-analise {
    margin:0 auto;
    width: 40%;
    padding:0.2em;
  }
  .banner-btn-analise > .btn {
    width:100%;
    padding:0.2em;
    box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
  }

  .teste { 
    border-radius: 30px;
  }

  @media(max-width:576px){
    .banner-search-box, .banner-btn-analise {
    margin:0 auto;
    width: 80%;
    padding:0.2em;
  }
  }

</style>

<style>

.carrousel {
  display:flex;
  flex-flow: row nowrap;
  position:relative;
  width:100%;
  height:30vh;
  padding:1rem;
}
.carrousel > * {
  width:300px;
  height:90%;
  margin:0 auto;
  display:flex;
  justify-content:center;
  align-items:center;
  border-radius:16px;

}

</style>

<main>

  <div class='banner'>
    <div class= 'banner-search-box'> 
        <form type='post' action='/search'>
          {{ csrf_field() }}
        <select id='fund' name="fund" class='teste'>
          <option value="" default >Escolha um fundo...</option>
          @foreach($funds as $fund)
        <option value={{$fund->ticker}}>{{$fund->name}} - {{$fund->ticker}} </option>
          @endforeach
        </select>
            <button type="submit" class='btn btn-padrao' style='width:100%;'>Entrar </button>
          </form>
  </div>
  </div>
</main>

<link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<script>
				$('#fund').selectize({
					allowEmptyOption: true
        });

        
				</script>

