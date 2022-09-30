<x-layout :title="trans('settings.tabs.Advertising_Terms')" >
    {{ BsForm::resource('settings')->patch(route('dashboard.settings.update')) }}
    
    @component('dashboard::components.box')
        @bsMultilangualFormTabs
        {{ BsForm::textarea('Advertising_Terms')
            ->attribute('class', 'form-control textarea')
            ->value(Settings::locale($locale->code)->get('Advertising_Terms')) }}
        @endBsMultilangualFormTabs

        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>