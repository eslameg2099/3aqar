<x-layout :title="$expert->name" :breadcrumbs="['dashboard.experts.edit', $expert]">
    {{ BsForm::resource('experts')->putModel($expert, route('dashboard.experts.update', $expert)) }}
    @component('dashboard::components.box')
        @slot('title', trans('experts.actions.edit'))

        @include('dashboard.expert.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('experts.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>