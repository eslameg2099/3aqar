@can('create', \App\Models\City::class)
    <a href="{{ route('dashboard.cities.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('cities.actions.create')
    </a>
@endcan
