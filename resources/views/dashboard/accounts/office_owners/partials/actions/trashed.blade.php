@can('viewAnyTrash', \App\Models\OfficeOwner::class)

    <a href="{{ route('dashboard.office-owners.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('office_owners.trashed')
    </a>
@endcan
