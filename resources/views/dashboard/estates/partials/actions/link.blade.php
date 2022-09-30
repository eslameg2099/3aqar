@if($estate)
    @if(method_exists($estate, 'trashed') && $estate->trashed())
        <a href="{{ route('dashboard.estates.trashed.show', $estate) }}" class="text-decoration-none text-ellipsis">
            {{ $estate->name }}
        </a>
    @else
        <a href="{{ route('dashboard.estates.show', $estate) }}" class="text-decoration-none text-ellipsis">
            {{ $estate->name }}
        </a>
    @endif
@else
    ---
@endif