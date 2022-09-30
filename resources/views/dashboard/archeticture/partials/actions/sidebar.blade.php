@component('dashboard::components.sidebarItem')
@slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Archeticture::class])

    @slot('url', route('dashboard.archeticture.index'))
    @slot('name', 'التصاميم')
    @slot('icon', 'fas fa-pencil-ruler')
    @slot('tree', [
        [
            'name' => trans('experts.actions.list'),
            'url' => route('dashboard.archeticture.index'),
            'can' => ['ability' => 'viewAny', 'model' => \App\Models\Archeticture::class],
         
        ],
        [
            'name' => 'اضافة تصميم',
            'url' => route('dashboard.archeticture.create'),
            'can' => ['ability' => 'create', 'model' => \App\Models\Archeticture::class],
        ],
    ])
@endcomponent
