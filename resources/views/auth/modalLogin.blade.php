<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body login-form">
        @include('auth.login')
      </div>
    </div>
  </div>
</div>

@if($loginOpen)
<script type="text/javascript">
    $(window).on('load',function(){
        $('#modalLogin').modal('show');
    });
</script>
@endif