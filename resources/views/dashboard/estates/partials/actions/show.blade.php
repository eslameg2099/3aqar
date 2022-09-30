@if(method_exists($estate, 'trashed') && $estate->trashed())
    @can('view', $estate)
        <a href="{{ route('dashboard.estates.trashed.show', $estate) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $estate)
        <a href="{{ route('dashboard.estates.show', $estate) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif