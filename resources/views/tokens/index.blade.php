@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div>
                @include('common.messages')
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('List of authentication tokens') }} 
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalCreteToken"accesskey="
                       "class="btn btn-primary btn-sm" title="{{ __('Add') }}">
                        <i class="bi bi-plus-square"></i>
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive"> 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Token name') }}</th>
                                    <th scope="col">{{ __('Last used at') }}</th>
                                    <th scope="col">{{ __('Expires at') }}</th>
                                    <th scope="col" class="d-none d-lg-table-cell">{{ __('Created at') }}</th>
                                    <th scope="col" class="d-none d-lg-table-cell">{{ __('Updated at') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (count($tokens) > 0)
                                @foreach ($tokens as $token)
                                <tr>
                                    <td>{{ $token->name }}</td>
                                    <td>{{ $token->last_used_at ?? '-' }}</td>
                                    <td>{{ $token->expires_at ?? '-' }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $token->created_at }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $token->updated_at }}</td>
                                    <td>
                                        <div class="d-flex flex-row mb-3">
                                            <div class="p-1">
                                                <a href="#" class="btn btn-danger btn-sm" title="{{ __('Delete') }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalConfirm"
                                                    data-confirm-action="{{ route('tokens.destroy', $token->id) }}"
                                                    data-confirm-message="{{ __('Are you sure you want to remove the ":name" token?', ['name' => $token->name]) }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('common.modal-confirm')
@include('tokens.include.modal-create-token')
@endsection