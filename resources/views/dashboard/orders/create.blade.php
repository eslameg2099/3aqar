<x-layout :title="trans('orders.actions.create')" :breadcrumbs="['dashboard.orders.create']">
    {{ BsForm::resource('orders')->post(route('dashboard.orders.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('orders.actions.create'))

        @include('dashboard.orders.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('orders.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>