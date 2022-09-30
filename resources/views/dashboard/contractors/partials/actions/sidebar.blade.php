@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Contractor::class])
    @slot('url', route('dashboard.contractors.index'))
    @slot('name', trans('contractors.plural'))
    @slot('icon', 'fas fa-street-view')
    @slot('badge', count_formatted(\App\Models\Contractor::where('stauts','0')->count()) ?: null)

    @slot('tree', [
        [
            'name' => trans('contractors.actions.list'),
            'url' => route('dashboard.contractors.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Contractor::class],
            
        ],
        [
            'name' => trans('contractors.actions.create'),
            'url' => route('dashboard.contractors.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Contractor::class],

        ],
    ])
@endcomponent
