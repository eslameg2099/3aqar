<x-layout :title="trans('customfield.addcutom')" :breadcrumbs="['dashboard.types.assgin']">
    {{ BsForm::resource('types')->post(route('dashboard.types.assgin')) }}
    @component('dashboard::components.box')
        @slot('title', trans('customfield.addcutom'))

        @include('dashboard.types.partials.form2')

        @slot('footer')
            {{ BsForm::submit()->label(trans('types.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>