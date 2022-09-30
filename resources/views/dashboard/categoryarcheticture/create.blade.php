<x-layout :title="trans('CategoryArcheticture.create')" :breadcrumbs="['dashboard.categoryarcheticture.create']">
    {{ BsForm::resource('categoryarcheticture')->post(route('dashboard.categoryarcheticture.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('CategoryArcheticture.actions.create'))
        @include('dashboard.categoryarcheticture.partials.form')
        @slot('footer')
            {{ BsForm::submit()->label(trans('cities.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>