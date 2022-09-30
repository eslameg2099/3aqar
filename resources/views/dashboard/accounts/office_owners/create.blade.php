<x-layout :title="trans('office_owners.actions.create')" :breadcrumbs="['dashboard.office_owners.create']">
    {{ BsForm::resource('office_owners')->post(route('dashboard.office-owners.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('office_owners.actions.create'))

        @include('dashboard.accounts.office_owners.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('office_owners.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>