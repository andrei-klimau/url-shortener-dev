@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                @include('common.messages')
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Dashboard') }}
                    <a href="{{ route('urls.index') }}" class="btn btn-primary btn-sm" title="{{ __('List of shortened links') }}">
                        <i class="bi bi-card-list"></i>
                    </a>
                </div>

                <div class="card-body">
                    @guest
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('URL shortener') }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ __('Getting started') }}</h6>
                                <p class="card-text">{{ __('To start using the service you must register or log in.') }}</p>
                                <a href="{{ route('login') }}" class="card-link">{{ __('Log in') }}</a>
                                <a href="{{ route('register') }}" class="card-link">{{ __('Register') }}</a>
                            </div>
                        </div>
                    @else
                        <h6 class="card-subtitle mb-2">
                            {{ __('Total links') }} <span class="badge bg-secondary">{{ $totalLinks }}</span>
                        </h6>
                        @if(!empty($lastUrl))
                            <h6 class="card-subtitle mb-2">
                                {{ __('Last link') }}
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
