<x-layout :title="$type->name" :breadcrumbs="['dashboard.types.edit', $type]">
    {{ BsForm::resource('types')->putModel($type, route('dashboard.types.update', $type)) }}
    @component('dashboard::components.box')
        @slot('title', trans('types.actions.edit'))

        @include('dashboard.types.partials.formedite')

        @slot('footer')
            {{ BsForm::submit()->label(trans('types.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>