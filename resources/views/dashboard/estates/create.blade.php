<x-layout :title="trans('estates.actions.create')" :breadcrumbs="['dashboard.estates.create']">
    {{ BsForm::resource('estates')->post(route('dashboard.estates.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('estates.actions.create'))

        @include('dashboard.estates.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('estates.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
    
</x-layout>
