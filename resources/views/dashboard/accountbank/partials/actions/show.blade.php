@if(method_exists($type, 'trashed') && $type->trashed())
    @can('view', $type)
        <a href="{{ route('dashboard.types.trashed.show', $type) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $type)
        <a href="{{ route('dashboard.types.show', $type) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif