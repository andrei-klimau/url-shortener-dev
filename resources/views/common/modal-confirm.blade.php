<div class="modal" data-role="modal-confirm" id="modalConfirm" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Please confirm</h5>
      </div>
      <div class="modal-body">
        <p data-role="modal-confirm-message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-role="modal-confirm-btn-yes">{{ __('Yes') }}</button>
        
        <form method="post" data-role="modal-confirm-form" action="/">
            @csrf
            @method('DELETE')
        </form>
      </div>
    </div>
  </div>
</div>

@pushOnce('scripts')
<script type="module">
    FormConfirm.init();
</script>
@endPushOnce