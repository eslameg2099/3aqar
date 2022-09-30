<x-layout :title="$RrquestArcheticture->user->name" :breadcrumbs="['dashboard.rquestarchetictures.edit', $RrquestArcheticture]">
    {{ BsForm::resource('rquestarchetictures')->putModel($RrquestArcheticture, route('dashboard.rquestarchetictures.update', $RrquestArcheticture)) }}
    @component('dashboard::components.box')
        @slot('title', 'الاجراء المتخذ')

        @include('dashboard.rquestarcheticture.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('experts.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>