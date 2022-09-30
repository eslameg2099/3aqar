@can('viewAnyTrash', \App\Models\Contractor::class)
    <a href="{{ route('dashboard.contractors.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('contractors.trashed')
    </a>
@endcan
