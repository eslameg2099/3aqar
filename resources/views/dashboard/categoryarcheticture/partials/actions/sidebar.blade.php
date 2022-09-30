@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\CategoryArcheticture::class])
    @slot('url', route('dashboard.categoryarcheticture.index'))
    @slot('name', 'انواع التصاميم')
    @slot('icon', 'fab fa-typo3')
    @slot('tree', [
        [
            'name' => trans('cities.actions.list'),
            'url' => route('dashboard.categoryarcheticture.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\CategoryArcheticture::class],
        
        ],
        [
            'name' => 'اضافة',
            'url' => route('dashboard.categoryarcheticture.create'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\CategoryArcheticture::class],
        ],
    ])
@endcomponent
