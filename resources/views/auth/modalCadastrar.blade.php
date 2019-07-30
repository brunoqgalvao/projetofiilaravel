<!-- Modal -->
<div class="modal fade" id="modalCadastrar" tabindex="-1" role="dialog" aria-labelledby="modalCadastrar"
  aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body login-form">
      @include('auth.register')
      </div>
    </div>
  </div>
</div>

@if($registerOpen)
<script type="text/javascript">
    $(window).on('load',function(){
        $('#modalCadastrar').modal('show');
    });
</script>
@endif


