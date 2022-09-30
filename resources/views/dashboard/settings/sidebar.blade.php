@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'manage', 'model' => \App\Models\Setting::class])
    @slot('url', '#')
    @slot('name', trans('settings.plural'))
    @slot('active', request()->routeIs('*settings*'))
    @slot('icon', 'fas fa-cogs')
    @slot('tree', [
        [
            'name' => trans('settings.tabs.main'),
            'url' => route('dashboard.settings.index', ['tab' => 'main']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'main',
        ],
        [
            'name' => trans('settings.tabs.contacts'),
            'url' => route('dashboard.settings.index', ['tab' => 'contacts']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'contacts',
        ],
        [
            'name' => trans('settings.tabs.count'),
            'url' => route('dashboard.settings.index', ['tab' => 'count']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'count',
        ],
        [
            'name' => trans('settings.tabs.about'),
            'url' => route('dashboard.settings.index', ['tab' => 'about']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'about',
        ],
        [
            'name' => trans('settings.tabs.terms'),
            'url' => route('dashboard.settings.index', ['tab' => 'terms']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'terms',
        ],
        [
            'name' => trans('settings.tabs.privacy'),
            'url' => route('dashboard.settings.index', ['tab' => 'privacy']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'privacy',
        ],
        [
            'name' => trans('settings.tabs.mail'),
            'url' => route('dashboard.settings.index', ['tab' => 'mail']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'mail',
        ],
        [
            'name' => trans('settings.tabs.pusher'),
            'url' => route('dashboard.settings.index', ['tab' => 'pusher']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'pusher',
        ],
        [
            'name' => trans('settings.tabs.Advertising_Terms'),
            'url' => route('dashboard.settings.index', ['tab' => 'Advertising_Terms']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'Advertising_Terms',
        ],
        [
            'name' => trans('settings.tabs.Advertising_fee'),
            'url' => route('dashboard.settings.index', ['tab' => 'Advertising_fee']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'Advertising_fee',
        ],
        [
            'name' => trans('settings.tabs.Discrimination'),
            'url' => route('dashboard.settings.index', ['tab' => 'Discrimination']),
            'active' => request()->routeIs('*settings*') && request('tab') == 'Discrimination',
        ],
        
        
       
        [
            'name' => trans('backup.download'),
            'url' => route('dashboard.backup.download'),
        ],
    ])
@endcomponent


