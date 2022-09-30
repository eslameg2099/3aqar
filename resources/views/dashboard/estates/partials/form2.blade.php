@include('dashboard.errors')

{{ BsForm::text('name') }}

{{ BsForm::number('space')->min(1) }}

{{ BsForm::number('price')->min(1) }}

{{ BsForm::text('address') }}

{{ BsForm::number('latitude') }}

{{ BsForm::number('longitude') }}

{{ BsForm::text('video') }}



<div class="form-group">
  {!! Form::Label('item', 'طريقة العرض') !!}
  <select class="form-control" name="type">
      <option value="1" @if($estate->type == "1")selected @endif>ملك</option>
      <option value="0" @if($estate->type == "0")selected @endif>ايجار</option>

  </select>
</div>

    <div class="form-group">
    <label>العملاء</label>
    <select name="user_id" class="form-control">
    @foreach($Users as $user)
    <option value="{{$user->id}}" @if($user->id == $estate->user_id)selected @endif>{{$user->name}}</option>
     @endforeach
    </select>
    </div>

    <div class="form-group">
    <label>نوع العقار</label>
    <select name="type_id" class="form-control">
    @foreach($types as $type)
    <option value="{{$type->id}}" @if($type->id == $estate->type_id)selected @endif >{{$type->name}}</option>
     @endforeach
    </select>
    </div>

    <div class="form-group">
  {!! Form::Label('item', 'نوع العميل') !!}
  <select class="form-control" name="user_type">
      <option value="1" @if($estate->user_type == "1")selected @endif>مالك</option>
      <option value="2" @if($estate->user_type == "2")selected @endif>مسوق</option>
      <option value="3" @if($estate->user_type == "3")selected @endif>عميل</option>
  </select>
</div>
<city-select value="{{ $estate->city_id ?? old('city_id') }}"></city-select>

{{ BsForm::textarea('description') }}

@isset($estate)
    {{ BsForm::image('image')->files($estate->getMediaResource()) }}
@else
    {{ BsForm::image('image')->unlimited() }}
@endisset

