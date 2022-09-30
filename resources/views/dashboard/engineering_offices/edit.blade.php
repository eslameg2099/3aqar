<x-layout :title="$engineering_office->name" :breadcrumbs="['dashboard.engineering_offices.edit', $engineering_office]">
    {{ BsForm::resource('engineering_offices')->putModel($engineering_office, route('dashboard.engineering_offices.update', $engineering_office)) }}
    @component('dashboard::components.box')
        @slot('title', trans('engineering_offices.actions.edit'))

        @include('dashboard.engineering_offices.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('engineering_offices.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>