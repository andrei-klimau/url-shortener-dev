<div class="modal" data-role="modal-create-token" id="modalCreteToken" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Create authentication token') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div data-role="modal-create-token-message" role="alert" data-success-msg="{{ __('Authentication token created successfully.') }}"
            data-save-token-msg="{{ __('Please copy and save the token.') }}"></div>
        <form method="post" data-role="modal-create-token-form" action="{{ route('tokens.create') }}">
            @csrf
            @method('POST')
            <div class="row mb-6">
                <label for="token_name" class="col-md-4 col-form-label text-md-end">{{ __('Token name') }}</label>

                <div class="col-md-6">
                    <input id="token_name" type="text" class="form-control @error('name') is-invalid @enderror"
                           name="token_name" aria-describedby="token_name_help" value="{{ old('token_name') }}" required autofocus>
                    <div id="token_name_help" class="form-text">{{ __('Token name length up to 255 characters.') }}</div>

                    @error('token_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-role="modal-create-token-btn-close">{{ __('Close') }}</button>
        <button type="button" class="btn btn-primary" data-role="modal-create-token-btn-submit">{{ __('Create') }}</button>
      </div>
    </div>
  </div>
</div>

@pushOnce('scripts')
@vite('resources/js/tokens/index.js')
@endPushOnce