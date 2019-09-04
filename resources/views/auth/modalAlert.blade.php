<!-- Modal -->
<div class="modal fade my-auto" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="false">
  <div class="modal-dialog" style="margin-top:40vh;" role="document">
    <div class="modal-content">
      <div class="modal-body" id="modal-alert-body">teste</div>
      <button aria-label='Close' class='close' data-dismiss='modal' style="position:absolute; top:5%; right:2%; z-index:150;">
        <i class='fa fa-times' style="color:black;"></i>
      </button>
    </div>
  </div>
</div>

<script type="text/javascript">

  function modalAlertwithTitleAndText(title,text){
    $('#modal-alert-body').html(
    `<p class='all-center'>${title}</p>
    <h5 class='all-center large'>${text}</>`);
    $('#modalAlert').modal('show');
  }
</script>