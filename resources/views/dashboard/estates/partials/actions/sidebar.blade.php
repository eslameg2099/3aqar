@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Estate::class])
    @slot('url', route('dashboard.estates.index'))
    @slot('name', trans('estates.plural'))
    @slot('icon', 'fas fa-building')
    @slot('tree', [
        [
            'name' => trans('estates.actions.list'),
            'url' => route('dashboard.estates.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Estate::class],
           
        ],
        [
            'name' => trans('estates.actions.create'),
            'url' => route('dashboard.estates.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Estate::class],
        ],
    ])
@endcomponent
