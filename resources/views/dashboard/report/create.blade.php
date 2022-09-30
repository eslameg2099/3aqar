<x-layout :title="trans('experts.actions.create')" :breadcrumbs="['dashboard.engineering_offices.create']">
    {{ BsForm::resource('experts')->post(route('dashboard.experts.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('experts.create'))

        @include('dashboard.expert.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('experts.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>