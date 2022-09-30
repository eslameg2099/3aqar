<x-layout :title="trans('estates.actions.sponser')" :breadcrumbs="['dashboard.estates.sponser',$estate]">
    {{ BsForm::resource('estates')->post(route('dashboard.estates.makesponser')) }}
    @component('dashboard::components.box')
        @slot('title', 'انشاء اعلان')

        @include('dashboard.estates.partials.sponser')

        @slot('footer')
            {{ BsForm::submit()->label(trans('estates.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
    
</x-layout>
