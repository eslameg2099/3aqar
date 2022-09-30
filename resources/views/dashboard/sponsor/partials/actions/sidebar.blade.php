@component('dashboard::components.sidebarItem')
@slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Estate::class])
    @slot('url', route('dashboard.sponsors.index'))
    @slot('name','الاعلانات')
    @slot('icon', 'fas fa-bullhorn')
    @slot('tree', [
        [
            'name' => trans('cities.actions.list'),
            'url' => route('dashboard.sponsors.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Estate::class],
           
        ],

        [
            'name' => 'حالية',
            'url' => route('dashboard.sponsors.view','current'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Estate::class],
           
        ],
        [
            'name' => 'جديدة',
            'url' => route('dashboard.sponsors.view','create'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Estate::class],
           
        ],
        [
            'name' => 'مرفوض',
            'url' => route('dashboard.sponsors.view','cancel'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Estate::class],
            
        ],
     
    ])
@endcomponent
