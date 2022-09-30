{{ BsForm::resource('reports')->get(url()->current()) }}
@component('dashboard::components.box')
    @slot('title', trans('report.filter'))
    
    <div class="row">
        <div class="col-md-3">
            {{ BsForm::text('name')->value(request('name'))->label(trans('report.attributes.name')) }}
        </div>
        <div class="col-md-3">
            {!! Form::Label('item', 'نوع') !!}
  <select class="form-control" name="owner">
      <option value="">الكل</option>
      <option value="customer">عميل</option>
      <option value="office_owner">مكتب هندسي</option>
   

  </select>
        </div>
        <div class="col-md-3">
        <div class="form-group">
  {!! Form::Label('item', 'بلاغ عن') !!}
  <select class="form-control" name="type">
      <option value="">الكل</option>
      <option value="estate">عقار</option>
      <option value="engineeringoffice">مكتب هندسي</option>
      <option value="contractor">مقاول</option>
      <option value="expert">مقيم</option>
      <option value="estateoffice">مكتب عقاري</option>

  </select>
</div>        </div>





        <div class="col-md-3">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                ->label(trans('experts.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('experts.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
