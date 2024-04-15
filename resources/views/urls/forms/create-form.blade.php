<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Creating a shortened link') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('urls.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Link name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" aria-describedby="name_help" value="{{ old('name') }}" required autofocus>
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
                                <input id="orig_url" type="text" class="form-control @error('orig_url') is-invalid @enderror" name="orig_url" value="{{ old('orig_url') }}" required>

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
                                <input id="short_url_key" type="text" class="form-control @error('short_url_key') is-invalid @enderror" name="short_url_key" aria-describedby="short_url_key_help" value="{{ $shortUrKey }}" required>
                                <div id="short_url_key_help" class="form-text">{{ __('Link length is from 8 to 16 characters. Acceptable characters: letters A-Z and numbers 0-9.') }}</div>
                                
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
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>