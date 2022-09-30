@if($contractor)
    @if(method_exists($contractor, 'trashed') && $contractor->trashed())
        <a href="{{ route('dashboard.contractors.trashed.show', $contractor) }}" class="text-decoration-none text-ellipsis">
            {{ $contractor->name }}
        </a>
    @else
        <a href="{{ route('dashboard.contractors.show', $contractor) }}" class="text-decoration-none text-ellipsis">
            {{ $contractor->name }}
        </a>
    @endif
@else
    ---
@endif