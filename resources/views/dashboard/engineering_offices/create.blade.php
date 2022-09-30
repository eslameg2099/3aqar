<x-layout :title="trans('engineering_offices.actions.create')" :breadcrumbs="['dashboard.engineering_offices.create']">
    {{ BsForm::resource('engineering_offices')->post(route('dashboard.engineering_offices.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('engineering_offices.actions.create'))

        @include('dashboard.engineering_offices.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('engineering_offices.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>