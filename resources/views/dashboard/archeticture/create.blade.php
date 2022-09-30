<x-layout :title="trans('Archeticture.actions.create')" :breadcrumbs="['dashboard.archeticture.create']">
    {{ BsForm::resource('archeticture')->post(route('dashboard.archeticture.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('Archeticture.create'))

        @include('dashboard.archeticture.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('experts.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>