{{ BsForm::resource('sponsors')->get(url()->current()) }}
@component('dashboard::components.box')
    @slot('title', 'الاعلانات')

    <div class="row">
        <div class="col-md-3">
            {{ BsForm::text('name')->value(request('name'))->label('اسم العميل') }}
        </div>
        <div class="col-md-3">
            {{ BsForm::number('id')
                ->value(request('id'))
                ->min(1)
                ->label('رقم الطلب') }}

        </div>
        <div class="col-md-6">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                ->label(trans('cities.perPage')) }}

        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('cities.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
