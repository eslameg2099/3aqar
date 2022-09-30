
<x-layout :title="trans('settings.tabs.Discrimination')" >
    {{ BsForm::resource('settings')->patch(route('dashboard.settings.update')) }}
    
    @component('dashboard::components.box')
        @bsMultilangualFormTabs
        {{ BsForm::textarea('Discrimination')
            ->attribute('class', 'form-control textarea')
            ->value(Settings::locale($locale->code)->get('Discrimination')) }}
        @endBsMultilangualFormTabs

        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>