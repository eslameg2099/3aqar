@can('viewAnyTrash', \App\Models\Order::class)
    <a href="{{ route('dashboard.orders.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('orders.trashed')
    </a>
@endcan
