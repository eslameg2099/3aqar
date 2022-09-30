<x-layout :title="trans('contractors.actions.create')" :breadcrumbs="['dashboard.contractors.create']">
    {{ BsForm::resource('contractors')->post(route('dashboard.contractors.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('contractors.actions.create'))

        @include('dashboard.contractors.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('contractors.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>