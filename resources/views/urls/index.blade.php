@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div>
                @include('common.messages')
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('List of shortened links') }} 
                    <a href="{{ route('urls.create') }}" class="btn btn-primary btn-sm" title="{{ __('Add') }}">
                        <i class="bi bi-plus-square"></i>
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive"> 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Link name') }}</th>
                                    <th scope="col">{{ __('Original link') }}</th>
                                    <th scope="col">{{ __('Shortened link') }}</th>
                                    <th scope="col">{{ __('Number of redirects') }}</th>
                                    <th scope="col" class="d-none d-lg-table-cell">{{ __('Latest statistics update') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (count($shortUrls) > 0)
                                @foreach ($shortUrls as $shortUrl)
                                <tr>
                                    <td>{{ $shortUrl->name }}</td>
                                    <td><a href="{{ $shortUrl->orig_url }}" target="_blank">{{ $shortUrl->orig_url }}</a></td>
                                    <td><a href="{{ url($shortUrl->short_url_key) }}" target="_blank">{{ $shortUrl->short_url_key }}</td>
                                    <td>{{ $shortUrl->redirectStatistic->redirect_count ?? 0 }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $shortUrl->redirectStatistic->updated_at ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex flex-row mb-3">
                                            <div class="p-1">
                                                <a href="{{ route('urls.edit', $shortUrl->id) }}" class="btn btn-primary btn-sm" title="{{ __('Edit') }}">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="p-1">
                                                <a href="#" class="btn btn-danger btn-sm" title="{{ __('Delete') }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalConfirm"
                                                    data-confirm-action="{{ route('urls.destroy', $shortUrl->id) }}"
                                                    data-confirm-message="{{ __('Are you sure you want to remove the ":name" link?', ['name' => $shortUrl->name]) }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No Data</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
            {{ $shortUrls->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('common.modal-confirm')
@endsection