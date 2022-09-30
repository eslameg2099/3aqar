<x-layout :title="trans('types.actions.create')" :breadcrumbs="['dashboard.types.create']">
    {{ BsForm::resource('types')->post(route('dashboard.types.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('types.actions.create'))

        @include('dashboard.types.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('types.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>