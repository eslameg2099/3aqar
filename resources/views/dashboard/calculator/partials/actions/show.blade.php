@if(method_exists($city, 'trashed') && $city->trashed())
    @can('view', $city)
        <a href="{{ route('dashboard.cities.trashed.show', $city) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $city)
        <a href="{{ route('dashboard.cities.show', $city) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif