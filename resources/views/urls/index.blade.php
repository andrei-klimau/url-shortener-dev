@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div>
                @include('common.messages')
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('shorturl.list_shortened_links') }}
                    <a href="{{ route('urls.create') }}" class="btn btn-primary btn-sm" title="{{ __('common.add') }}">
                        <i class="bi bi-plus-square"></i>
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive"> 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('shorturl.link_name') }}</th>
                                    <th scope="col">{{ __('shorturl.original_link') }}</th>
                                    <th scope="col">{{ __('shorturl.shortened_link') }}</th>
                                    <th scope="col">{{ __('shorturl.number_redirects') }}</th>
                                    <th scope="col" class="d-none d-lg-table-cell">{{ __('shorturl.latest_stats_update') }}</th>
                                    <th scope="col">{{ __('common.actions') }}</th>
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
                                    <td class="d-none d-lg-table-cell">
                                        @if(empty($shortUrl->redirectStatistic->updated_at))
                                            <span>-</span>
                                        @else
                                            @include('common.date-time', ['date' => $shortUrl->redirectStatistic->updated_at])
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row mb-3">
                                            <div class="p-1">
                                                <a href="{{ route('urls.edit', $shortUrl->id) }}" class="btn btn-primary btn-sm" title="{{ __('common.edit') }}">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="p-1">
                                                <a href="#" class="btn btn-danger btn-sm" title="{{ __('common.delete') }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalConfirm"
                                                    data-confirm-action="{{ route('urls.destroy', $shortUrl->id) }}"
                                                    data-confirm-message="{{ __('shorturl.are_you_sure_remove', ['name' => $shortUrl->name]) }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">{{ __('common.no_data') }}</td>
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