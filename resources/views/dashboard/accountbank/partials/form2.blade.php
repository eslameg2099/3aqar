@include('dashboard.errors')
<input type="hidden" name="type" value="{{$Type->id}}">

<div class="form-group">
    
                            <select name="id" class="form-control">
                                @foreach ($CustomFields as $category)

                                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
