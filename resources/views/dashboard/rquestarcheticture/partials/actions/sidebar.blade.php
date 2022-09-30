@component('dashboard::components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Archeticture::class])
    @slot('url', route('dashboard.rquestarchetictures.index'))
    @slot('badge', count_formatted(\App\Models\RrquestArcheticture::where('comment',null)->count()) ?: null)

    @slot('name', 'طلبات التصميم')

    @slot('icon', 'fab fa-affiliatetheme')

   
@endcomponent
