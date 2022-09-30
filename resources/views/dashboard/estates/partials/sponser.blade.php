@include('dashboard.errors')

<div class="form-group">
{!! Form::Label('item', 'رقم العقار') !!}:

<input type="text" name="id" class="form-control" value="{{$estate->id}}" readonly>



</div>

<div class="form-group">
  {!! Form::Label('item', 'طريقة العرض') !!}
  <select class="form-control" name="type">
      <option value="banner">بانر</option>
      <option value="default">عادي</option>

  </select>
</div>
<div class="form-group">
{!! Form::Label('item', 'تاريخ الانتهاء') !!}

<input type="date" name="date" class="form-control" value="">

</div>




{{ BsForm::image('image') }}
