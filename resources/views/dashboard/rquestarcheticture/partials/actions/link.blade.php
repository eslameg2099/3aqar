@if($engineering_office)
    @if(method_exists($engineering_office, 'trashed') && $engineering_office->trashed())
        <a href="{{ route('dashboard.engineering_offices.trashed.show', $engineering_office) }}" class="text-decoration-none text-ellipsis">
            {{ $engineering_office->name }}
        </a>
    @else
        <a href="{{ route('dashboard.engineering_offices.show', $engineering_office) }}" class="text-decoration-none text-ellipsis">
            {{ $engineering_office->name }}
        </a>
    @endif
@else
    ---
@endif