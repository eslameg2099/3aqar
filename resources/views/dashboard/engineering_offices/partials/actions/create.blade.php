@can('create', \App\Models\EngineeringOffice::class)
    <a href="{{ route('dashboard.engineering_offices.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('engineering_offices.actions.create')
    </a>
@endcan
