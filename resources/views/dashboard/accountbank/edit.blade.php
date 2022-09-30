<x-layout :breadcrumbs="['dashboard.accountbank.index']">
    {{ BsForm::resource('accountbank')->putModel($accountbank, route('dashboard.accountbank.update', $accountbank)) }}
    @component('dashboard::components.box')
        @slot('title','تعديل ابراء الذمة')

        @include('dashboard.accountbank.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('types.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>