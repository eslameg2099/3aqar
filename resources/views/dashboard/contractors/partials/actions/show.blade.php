@if(method_exists($contractor, 'trashed') && $contractor->trashed())
    @can('view', $contractor)
        <a href="{{ route('dashboard.contractors.trashed.show', $contractor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $contractor)
        <a href="{{ route('dashboard.contractors.show', $contractor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif