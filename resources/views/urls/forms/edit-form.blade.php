<div class="container">
    <div class="row justify-content-center">
                    <div>
                @include('common.messages')
            </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editing a shortened link') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('urls.update', $shortUrl->id) }}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $shortUrl->id }}">
                        <input type="hidden" name="user_id" value="{{ $shortUrl->user_id }}">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Link name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" aria-describedby="name_help" value="{{ $shortUrl->name }}" required autofocus>
                                <div id="name_help" class="form-text">{{ __('Link name length up to 255 characters.') }}</div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="orig_url" class="col-md-4 col-form-label text-md-end">{{ __('Original link') }}</label>

                            <div class="col-md-6">
                                <input id="orig_url" type="text" class="form-control @error('orig_url') is-invalid @enderror" name="orig_url" value="{{ $shortUrl->orig_url }}" required required>

                                @error('orig_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="short_url_key" class="col-md-4 col-form-label text-md-end">{{ __('Shortened link') }}</label>

                            <div class="col-md-6">
                                <input id="short_url_key" type="text" class="form-control @error('short_url_key') is-invalid @enderror" name="short_url_key" aria-describedby="short_url_key_help" value="{{ $shortUrl->short_url_key }}" required>
                                <div id="short_url_key_help" class="form-text">{{ __('Link length is from :uniqueIdMinLen to :uniqueIdMaxLen characters. Acceptable characters: letters A-Z and numbers 0-9.',
                                    compact('uniqueIdMinLen', 'uniqueIdMaxLen')) }}</div>

                                @error('short_url_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
