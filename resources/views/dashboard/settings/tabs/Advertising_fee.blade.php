<x-layout :title="trans('settings.tabs.Advertising_fee')" >
    {{ BsForm::resource('settings')->patch(route('dashboard.settings.update')) }}
    
    @component('dashboard::components.box')
        @bsMultilangualFormTabs
        {{ BsForm::textarea('Advertising_fee')
            ->attribute('class', 'form-control textarea')
            ->value(Settings::locale($locale->code)->get('Advertising_fee')) }}
        @endBsMultilangualFormTabs

        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>