<x-layout :title="$advisor->city->name" :breadcrumbs="['dashboard.cities.edit', $advisor->city]">
    {{ BsForm::resource('advisor')->putModel($advisor->id, route('dashboard.advisor.update', $advisor->id)) }}
    @component('dashboard::components.box')
        @slot('title', trans('cities.actions.edit'))

        @include('dashboard.advisor.partials.form2')

        @slot('footer')
            {{ BsForm::submit()->label(trans('cities.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>