@if(Gate::allows('viewAny', \App\Models\User::class)
    || Gate::allows('viewAny', \App\Models\Supervisor::class)
    || Gate::allows('viewAny', \App\Models\Customer::class))
    @component('dashboard::components.sidebarItem')
        @slot('url', '#')
        @slot('name','المكاتب العقارية')
        @slot('icon', 'fas fa-home')
        @slot('tree', [
           
            [
                'name' => 'اصحاب المكاتب',
                'url' => route('dashboard.office-owners.index'),
                'can' => ['ability' => 'viewAny', 'model' => \App\Models\OfficeOwner::class],
            ],
            [
                'name' => 'المكاتب الموقوفة',

                'url' => route('dashboard.offices.officenotactive'),
                'can' => ['ability' => 'viewAny', 'model' => \App\Models\OfficeOwner::class],
            ],
            [
                'name' => 'المكاتب المفعلة ',

                'url' => route('dashboard.offices.officeactive'),
                'can' => ['ability' => 'viewAny', 'model' => \App\Models\OfficeOwner::class],
            ],
            
          
        ])
    @endcomponent
@endif
