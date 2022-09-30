@component('dashboard::components.sidebarItem')
@slot('can', ['ability' => 'manage', 'model' => \App\Models\Setting::class])
    @slot('url', route('dashboard.cities.index'))
    @slot('name', 'الحاسبة')
    @slot('icon', 'fas fa-calculator')
    @slot('tree', [
        [
            'name' => 'سعر البناء علي العظم',
            'url' => route('dashboard.calculator.index',['tab' => 'building_Bone']),
        ],
        [
            'name' => 'سعر البناء علي المفتاح',
            'url' => route('dashboard.calculator.index',['tab' => 'building_key']),
        ],
        [
            'name' => 'الضريبة',
            'url' => route('dashboard.calculator.index',['tab' => 'tax']),
        ],
        [
            'name' => 'السعي',
            'url' => route('dashboard.calculator.index',['tab' => 'commission']),
        ],
        
    ])
@endcomponent
