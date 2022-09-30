<x-layout :title="$officeOwner->name" :breadcrumbs="['dashboard.office_owners.edit', $officeOwner]">
    {{ BsForm::resource('office_owners')->putModel($officeOwner, route('dashboard.office-owners.update', $officeOwner), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('office_owners.actions.edit'))

        @include('dashboard.accounts.office_owners.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('office_owners.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
