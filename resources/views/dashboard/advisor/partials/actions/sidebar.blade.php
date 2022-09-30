@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Advisor::class])
    @slot('url', route('dashboard.advisor.index'))
    @slot('name', 'مستشار')
    @slot('icon', 'fab fa-algolia')
    @slot('tree', [
        [
            'name' => trans('cities.actions.list'),
            'url' => route('dashboard.advisor.index'),
           
        ],
        [
            'name' => 'اضافة',
            'url' => route('dashboard.advisor.create'),
        ],
    ])
@endcomponent
