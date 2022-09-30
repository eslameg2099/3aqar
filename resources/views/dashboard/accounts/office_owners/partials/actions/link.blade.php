@if($officeOwner)
    @if(method_exists($officeOwner, 'trashed') && $officeOwner->trashed())
        <a href="{{ route('dashboard.office-owners.trashed.show', $officeOwner) }}" class="text-decoration-none text-ellipsis">
            {{ $officeOwner->name }}
        </a>
    @else
        <a href="{{ route('dashboard.office-owners.show', $officeOwner) }}" class="text-decoration-none text-ellipsis">
            {{ $officeOwner->name }}
        </a>
    @endif
@else
    ---
@endif