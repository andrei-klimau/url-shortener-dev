@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                @include('common.messages')
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('home.dashboard') }}
                    @auth
                        <a href="{{ route('urls.index') }}" class="btn btn-primary btn-sm" title="{{ __('home.list_of_shortened_links') }}">
                            <i class="bi bi-card-list"></i>
                        </a>
                    @endauth
                </div>

                <div class="card-body">
                    @guest
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('home.url_shortener') }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ __('home.getting_started') }}</h6>
                                <p class="card-text">{{ __('home.start_using_service') }}</p>
                                <a href="{{ route('login') }}" class="card-link">{{ __('home.login') }}</a>
                                <a href="{{ route('register') }}" class="card-link">{{ __('home.register') }}</a>
                            </div>
                        </div>
                    @else
                        <h6 class="card-subtitle mb-2">
                            {{ __('home.total_links') }} <span class="badge bg-secondary">{{ $totalLinks }}</span>
                        </h6>
                        @if(!empty($lastUrl))
                            <h6 class="card-subtitle mb-2">
                                {{ __('home.last_created_link') }}
                                <span class="badge bg-light text-dark">
                                    <a href="{{ url($lastUrl->short_url_key) }}" target="_blank">{{ $lastUrl->orig_url }}</a>
                                </span>
                            </h6>
                        @endif
                        @include('urls.forms.create-form')
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
