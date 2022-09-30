<x-layout :title="$CustomField->name" :breadcrumbs="['dashboard.customers.edit', $CustomField]">
    {{ BsForm::resource('customers')->putModel($CustomField, route('dashboard.customfield.update', $CustomField), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('customers.actions.edit'))

        @include('dashboard.CustomFields.partials.form2')

        @slot('footer')
            {{ BsForm::submit()->label(trans('customers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
