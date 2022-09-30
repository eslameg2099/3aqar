@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}

@endBsMultilangualFormTabs
<div class="form-group">
                            <label>النوع</label>
                            
                            <select name="type" class="form-control">
                            
                                    <option value="0" @if($type->type == "0")selected @endif>ايجار</option>
                                    <option value="1" @if($type->type == "1")selected @endif>ملك</option>

                            </select>
                        </div>