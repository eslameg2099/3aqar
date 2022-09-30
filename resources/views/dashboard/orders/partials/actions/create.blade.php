@can('create', \App\Models\Order::class)
    <a href="{{ route('dashboard.orders.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('orders.actions.create')
    </a>
@endcan
