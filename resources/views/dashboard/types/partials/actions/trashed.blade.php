@can('viewAnyTrash', \App\Models\Type::class)
    <a href="{{ route('dashboard.types.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('types.trashed')
    </a>
@endcan
