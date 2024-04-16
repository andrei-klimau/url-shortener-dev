@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('errors'))
    <div class="alert alert-danger" role="alert">
        @if ($errors->count() > 1)
            <ul class="list-group list-group-flush">
                @foreach($errors->all() as $error)
                    <li class="list-group-item bg-transparent">{{ $error }}</li>
                @endforeach
            </ul>
        @else
            {{ $errors->first() }}
        @endif
    </div>
@endif