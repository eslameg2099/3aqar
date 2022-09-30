@if(method_exists($officeOwner, 'trashed') && $officeOwner->trashed())
    @can('view', $officeOwner)
        <a href="{{ route('dashboard.office-owners.trashed.show', $officeOwner) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $officeOwner)
        <a href="{{ route('dashboard.office-owners.show', $officeOwner) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif