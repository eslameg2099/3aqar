<x-layout :title="$order->name" :breadcrumbs="['dashboard.orders.edit', $order]">
    {{ BsForm::resource('orders')->putModel($order, route('dashboard.orders.update', $order)) }}
    @component('dashboard::components.box')
        @slot('title', trans('orders.actions.edit'))

        @include('dashboard.orders.partials.formedit')

        @slot('footer')
            {{ BsForm::submit()->label(trans('orders.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>