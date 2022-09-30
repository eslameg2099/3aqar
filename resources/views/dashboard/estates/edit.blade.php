<x-layout :title="$estate->name" :breadcrumbs="['dashboard.estates.edit', $estate]">
    {{ BsForm::resource('estates')->putModel($estate, route('dashboard.estates.update', $estate)) }}
    @component('dashboard::components.box')
        @slot('title', trans('estates.actions.edit'))

        @include('dashboard.estates.partials.form2')

        @slot('footer')
            {{ BsForm::submit()->label(trans('estates.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>