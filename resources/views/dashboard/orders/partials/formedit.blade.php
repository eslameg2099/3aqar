@include('dashboard.errors')

  {{ BsForm::text('name') }}
  {{ BsForm::textarea('description')->attribute('class', 'form-control textarea') }}

   <div class="form-group">
    <label>نوع العقار</label>
    <select name="type_id" class="form-control">
    @foreach($types as $type)
    <option value="{{$type->id}}" @if($order->type_id == $type->id)selected @endif  >{{$type->name}}  </option>
     @endforeach
    </select>
    </div>

    <div class="form-group">
  {!! Form::Label('item', 'طريقة العرض') !!}
   <select class="form-control" name="type">
      <option value="1" @if($order->type == "1")selected @endif>ملك</option>
      <option value="0" @if($order->type == "0")selected @endif>ايجار</option>

    </select>
    </div>

    <div class="form-group">
    <label>العميل</label>
    <select name="user_id" class="form-control">
    @foreach($Users as $User)
    <option value="{{$User->id}}" @if($order->user_id == $User->id)selected @endif  >{{$User->name}}  </option>
     @endforeach
    </select>
    </div>

    <city-select value="{{ $order->city_id ?? old('city_id') }}"></city-select>

    {{ BsForm::number('space_from') }}
    {{ BsForm::number('space_to') }}

    {{ BsForm::number('price_from') }}
    {{ BsForm::number('price_to') }}