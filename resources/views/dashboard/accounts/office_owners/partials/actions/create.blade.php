@can('create', \App\Models\OfficeOwner::class)
    <a href="{{ route('dashboard.office-owners.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('office_owners.actions.create')
    </a>
@endcan
