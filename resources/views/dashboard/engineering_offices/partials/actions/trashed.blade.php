@can('viewAnyTrash', \App\Models\EngineeringOffice::class)
    <a href="{{ route('dashboard.engineering_offices.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('engineering_offices.trashed')
    </a>
@endcan
