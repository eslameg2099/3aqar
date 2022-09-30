@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name')->label(trans('customfield.attributes.name')) }}
@endBsMultilangualFormTabs

<div class="form-group">

  {!! Form::Label('item', 'مطلوب') !!}
  <select class="form-control" name="required">
      <option value="1" @if($CustomField->required == '1')selected @endif>@lang('customfield.accept')</option>
      <option value="0" @if($CustomField->required == '0')selected @endif>@lang('customfield.no')</option>

  </select>
</div>

<div class="form-group">
  {!! Form::Label('item', 'طريقة عرض') !!}
  <select class="form-control" name="type">
      <option value="switch" @if($CustomField->type == "switch")selected @endif>التبديل</option>
      <option value="buttons" @if($CustomField->type == "buttons")selected @endif>ازرار</option>
      <option value="text" @if($CustomField->type == "text")selected @endif>نص</option>
      <option value="number" @if($CustomField->type == "number")selected @endif>رقم</option>


  </select>
</div>
