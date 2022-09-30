<x-layout :title="$city->name" :breadcrumbs="['dashboard.cities.edit', $city]">
    {{ BsForm::resource('cities')->putModel($city, route('dashboard.cities.update', $city)) }}
    @component('dashboard::components.box')
        @slot('title', trans('cities.actions.edit'))

        @include('dashboard.cities.partials.form2')

        @slot('footer')
            {{ BsForm::submit()->label(trans('cities.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>