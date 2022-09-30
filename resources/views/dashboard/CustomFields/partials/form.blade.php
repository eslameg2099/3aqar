@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name')->label(trans('customfield.attributes.name')) }}
@endBsMultilangualFormTabs

<div class="form-group">
  {!! Form::Label('item', 'مطلوب') !!}
  <select class="form-control" name="required">
      <option value="1">@lang('customfield.accept')</option>
      <option value="0">@lang('customfield.no')</option>

  </select>
</div>

<div class="form-group">
  {!! Form::Label('item', 'طريقة عرض') !!}
  <select class="form-control" name="type">
      <option value="switch">التبديل</option>
      <option value="buttons">ازرار</option>
      <option value="text">نص</option>
      <option value="number">رقم</option>


  </select>
</div>


