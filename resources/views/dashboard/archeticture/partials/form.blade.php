@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name')->label(trans('Archeticture.attributes.name')) }}
{{ BsForm::textarea('description')->label(trans('Archeticture.attributes.description')) }}

@endBsMultilangualFormTabs
<div class="form-group">
    <label>نوع التصميم</label>
    <select name="category_id" class="form-control">
    @foreach($CategoryArchetictures as $CategoryArcheticture)
    <option value="{{$CategoryArcheticture->id}}" >{{$CategoryArcheticture->name}}  </option>
     @endforeach
    </select>
    </div>
<div class="form-group">
    <label>نوع العقار</label>
    <select name="type_id" class="form-control">
    @foreach($types as $type)
    <option value="{{$type->id}}" >{{$type->name}}  </option>
     @endforeach
    </select>
    </div>

    

    {{ BsForm::text('video')->label(trans('Archeticture.video')) }}


    {{ BsForm::image('image')->unlimited()->label(trans('Archeticture.attributes.image')) }}


