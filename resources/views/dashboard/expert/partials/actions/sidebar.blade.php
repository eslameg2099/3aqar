@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\EngineeringOffice::class])
    @slot('url', route('dashboard.engineering_offices.index'))
    @slot('name', 'المقيمين')
    @slot('icon', 'far fa-id-badge')
    @slot('badge', count_formatted(\App\Models\Expert::where('stauts','0')->count()) ?: null)

    @slot('tree', [
        [
            'name' => trans('experts.actions.list'),
            'url' => route('dashboard.experts.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\EngineeringOffice::class],
         
        ],
        [
            'name' => trans('experts.actions.create'),
            'url' => route('dashboard.experts.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\EngineeringOffice::class],
        ],
    ])
@endcomponent
