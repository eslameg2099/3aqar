@if(method_exists($type, 'trashed') && $type->trashed())
    @can('view', $type)
        <a href="{{ route('dashboard.types.active', $type) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-up"></i>
        </a>
    @endcan
@else
    @can('view', $type)
        <a href="{{ route('dashboard.types.active', $type) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-up"></i>
        </a>
    @endcan
@endif