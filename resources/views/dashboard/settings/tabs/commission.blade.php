<x-layout  :breadcrumbs="['dashboard.settings.index']">
{{ BsForm::resource('advisor')->putModel($Setting->id, route('dashboard.calculator.update', $Setting->id)) }}
    @component('dashboard::components.box')

    <div class="form-group"> 
<label>نسبة السعي</label>

<input type="number" name="value"  class="form-control" value="{{ $Setting->value}}"  min="1" max="100"required>
</div>      

        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>