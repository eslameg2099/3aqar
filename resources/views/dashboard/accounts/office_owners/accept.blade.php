@if(method_exists($officeOwner, 'trashed') && $officeOwner->trashed())
    @can('view', $officeOwner)
        <a href="{{ route('dashboard.offices.accept', $officeOwner) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas far fa-check-circle"></i>
        </a>
    @endcan
@else
    @can('view', $officeOwner)
        <a href="{{ route('dashboard.offices.accept', $officeOwner) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas far fa-check-circle"></i>
        </a>
    @endcan
@endif