@can('viewAnyTrash', \App\Models\Customer::class)
    <a href="{{ route('dashboard.customfield.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('customfield.trashed')
    </a>
@endcan
