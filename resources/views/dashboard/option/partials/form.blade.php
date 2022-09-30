@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name')->label('اسم الخيار')  }}
@endBsMultilangualFormTabs

<input type="hidden" name="custom_field_id" value="{{$CustomField->id}}">


