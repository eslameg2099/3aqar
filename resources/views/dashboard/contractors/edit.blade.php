<x-layout :title="$contractor->name" :breadcrumbs="['dashboard.contractors.edit', $contractor]">
    {{ BsForm::resource('contractors')->putModel($contractor, route('dashboard.contractors.update', $contractor)) }}
    @component('dashboard::components.box')
        @slot('title', trans('contractors.actions.edit'))

        @include('dashboard.contractors.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('contractors.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>