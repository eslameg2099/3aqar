@can('create', \App\Models\Contractor::class)
    <a href="{{ route('dashboard.contractors.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('contractors.actions.create')
    </a>
@endcan
