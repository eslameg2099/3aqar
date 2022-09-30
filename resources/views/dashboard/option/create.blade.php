<x-layout :title="trans('customers.actions.create')"  :breadcrumbs="['dashboard.customers.create']">
    {{ BsForm::resource('customers')->post(route('dashboard.optionfield.store')) }}
    
    @component('dashboard::components.box')
        @slot('title', trans('customers.actions.create'))

        @include('dashboard.option.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('customers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>