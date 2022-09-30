@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Type::class])
    @slot('url', route('dashboard.types.index'))
    @slot('name', trans('types.plural'))
    @slot('icon', 'fas fa-border-style')
    @slot('tree', [
        [
            'name' => trans('types.actions.list'),
            'url' => route('dashboard.types.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Type::class],
            
        ],
        [
            'name' => trans('types.actions.create'),
            'url' => route('dashboard.types.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Type::class],
        ],
    ])
@endcomponent
