@props(['parsedDate' => \Carbon\Carbon::parse($date)])
<abbr class="initialism" title="{{ $parsedDate->translatedFormat('j F Y H:i:s') }}">
    {{ $parsedDate->diffForHumans() }}
</abbr>