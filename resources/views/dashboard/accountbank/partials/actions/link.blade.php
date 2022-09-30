@if($type)
    @if(method_exists($type, 'trashed') && $type->trashed())
        <a href="{{ route('dashboard.types.trashed.show', $type) }}" class="text-decoration-none text-ellipsis">
            {{ $type->name }}
        </a>
    @else
        <a href="{{ route('dashboard.types.show', $type) }}" class="text-decoration-none text-ellipsis">
            {{ $type->name }}
        </a>
    @endif
@else
    ---
@endif