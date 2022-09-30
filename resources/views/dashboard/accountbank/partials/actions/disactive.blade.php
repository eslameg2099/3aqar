@if(method_exists($type, 'trashed') && $type->trashed())
    @can('view', $type)
        <a href="{{ route('dashboard.types.disactive', $type) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-down"></i>
        </a>
    @endcan
@else
    @can('view', $type)
        <a href="{{ route('dashboard.types.disactive', $type) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-down"></i>
        </a>
    @endcan
@endif