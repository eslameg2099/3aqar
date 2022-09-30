@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Contractor::class])
    @slot('url', route('dashboard.customfield.index'))
    @slot('name', 'الخصائص')
    @slot('icon', 'fas fa-th')
    @slot('tree', [
        [
            'name' => 'الخصائص',
            'url' => route('dashboard.customfield.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Contractor::class],
        
        ],
        [
            'name' => 'اضافة خاصية',
            'url' => route('dashboard.customfield.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\City::class],
        ],

    ])
@endcomponent
