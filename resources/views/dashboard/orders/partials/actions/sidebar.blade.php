@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Order::class])
    @slot('url', route('dashboard.orders.index'))
    @slot('name', trans('orders.plural'))
    @slot('icon', 'fas fa-door-open')
    @slot('tree', [
        [
            'name' => trans('orders.actions.list'),
            'url' => route('dashboard.orders.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Order::class],
            
        ],
        [
            'name' => trans('orders.actions.create'),
            'url' => route('dashboard.orders.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Order::class],
        ],
    ])
@endcomponent
