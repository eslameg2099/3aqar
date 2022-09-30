@component('dashboard::components.sidebarItem')
@slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Report::class])

    @slot('url', route('dashboard.reports.index'))
    @slot('name', 'البلاغات')
    @slot('icon', 'fas fa-bug')
    @slot('badge', count_formatted(\App\Models\Report::where('status','0')->count()) ?: null)

@endcomponent


