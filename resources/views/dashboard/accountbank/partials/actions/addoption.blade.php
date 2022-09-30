@if(method_exists($type, 'trashed') && $type->trashed())
    @can('view', $type)
        <a href="{{ route('dashboard.customfield.create', $type) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas far fa-plus-square"></i>
        </a>
    @endcan
@else
    @can('view', $type)
        <a href="{{ route('dashboard.customfield.cr', $type) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas far fa-plus-square"></i>
        </a>
    @endcan
@endif