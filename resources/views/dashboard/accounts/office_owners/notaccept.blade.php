@if(method_exists($officeOwner, 'trashed') && $officeOwner->trashed())
    @can('view', $officeOwner)
        <a href="{{ route('dashboard.offices.notaccept', $officeOwner) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fas fa-ban"></i>
        </a>
    @endcan
@else
    @can('view', $officeOwner)
        <a href="{{ route('dashboard.offices.notaccept', $officeOwner) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fas fa-ban"></i>
        </a>
    @endcan
@endif