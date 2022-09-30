@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
{{ BsForm::textarea('description') }}

@endBsMultilangualFormTabs
   <div class="form-group">
    <label>نوع التصميم</label>
    <select name="category_id" class="form-control">
    @foreach($CategoryArchetictures as $CategoryArcheticture)
    <option value="{{$CategoryArcheticture->id}}" @if($CategoryArcheticture->id == $Archeticture->category_id)selected @endif  >{{$CategoryArcheticture->name}}  </option>
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

    


    {{ BsForm::text('video') }}



    @isset($Archeticture)
    {{ BsForm::image('image')->files($Archeticture->getMediaResource()) }}
    @else
    {{ BsForm::image('image')->unlimited() }}
    @endisset