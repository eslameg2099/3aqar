<x-layout :title="trans('cities.actions.create')" :breadcrumbs="['dashboard.cities.create']">
    {{ BsForm::resource('cities')->post(route('dashboard.advisor.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('cities.actions.create'))

        @include('dashboard.advisor.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('cities.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>