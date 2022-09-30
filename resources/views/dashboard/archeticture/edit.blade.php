<x-layout :title="$Archeticture->name" :breadcrumbs="['dashboard.archeticture.edit', $Archeticture]">
    {{ BsForm::resource('archeticture')->putModel($Archeticture, route('dashboard.archeticture.update', $Archeticture)) }}
    @component('dashboard::components.box')
        @slot('title', trans('Archeticture.actions.edit'))

        @include('dashboard.archeticture.partials.form2')

        @slot('footer')
            {{ BsForm::submit()->label(trans('experts.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>