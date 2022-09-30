@can('create', \App\Models\Type::class)
    <a href="{{ route('dashboard.types.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('types.actions.create')
    </a>
@endcan
