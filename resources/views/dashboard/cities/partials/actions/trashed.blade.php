@can('viewAnyTrash', \App\Models\City::class)
    <a href="{{ route('dashboard.cities.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('cities.trashed')
    </a>
@endcan
