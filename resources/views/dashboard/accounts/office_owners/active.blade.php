@if(method_exists($officeOwner, 'trashed') && $officeOwner->trashed())
    @can('view', $officeOwner)
        <a href="{{ route('dashboard.offices.active', $officeOwner) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-up"></i>
        </a>
    @endcan
@else
    @can('view', $officeOwner)
        <a href="{{ route('dashboard.offices.active', $officeOwner) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-up"></i>
        </a>
    @endcan
@endif