@if(method_exists($engineering_office, 'trashed') && $engineering_office->trashed())
    @can('view', $engineering_office)
        <a href="{{ route('dashboard.engineering_offices.trashed.show', $engineering_office) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $engineering_office)
        <a href="{{ route('dashboard.engineering_offices.show', $engineering_office) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif