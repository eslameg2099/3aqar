<x-layout :title="$CategoryArcheticture->name" :breadcrumbs="['dashboard.categoryarcheticture.edit', $CategoryArcheticture]">
    {{ BsForm::resource('categoryarcheticture')->putModel($CategoryArcheticture, route('dashboard.categoryarcheticture.update', $CategoryArcheticture->id)) }}
    @component('dashboard::components.box')
        @slot('title', trans('CategoryArcheticture.actions.edit'))
        @include('dashboard.categoryarcheticture.partials.form')
        @slot('footer')
            {{ BsForm::submit()->label(trans('cities.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>