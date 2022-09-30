@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\EngineeringOffice::class])
    @slot('url', route('dashboard.engineering_offices.index'))
    @slot('name', trans('engineering_offices.plural'))
    @slot('icon', 'fas fa-laptop-house')
    @slot('badge', count_formatted(\App\Models\EngineeringOffice::where('stauts','0')->count()) ?: null)

    @slot('tree', [
        [
            'name' => trans('engineering_offices.actions.list'),
            'url' => route('dashboard.engineering_offices.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\EngineeringOffice::class],
           
        ],
        [
            'name' => trans('engineering_offices.actions.create'),
            'url' => route('dashboard.engineering_offices.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\EngineeringOffice::class],
        ],
    ])
@endcomponent
