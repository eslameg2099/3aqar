<x-layout :title="$FieldOption->name" :breadcrumbs="['dashboard.customers.edit', $FieldOption]">
    {{ BsForm::resource('optionfield')->putModel($FieldOption, route('dashboard.optionfield.update', $FieldOption), ['files' => true]) }}
    @component('dashboard::components.box')
        @slot('title', trans('customers.actions.edit'))

        @include('dashboard.option.partials.form2')

        @slot('footer')
            {{ BsForm::submit()->label(trans('customers.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
