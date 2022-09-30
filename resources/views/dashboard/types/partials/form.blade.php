@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}

@endBsMultilangualFormTabs
<div class="form-group">
                            <label>النوع</label>
                            
                            <select name="type" class="form-control">
                                    <option value="0">ايجار</option>
                                    <option value="1">ملك</option>

                            </select>
                        </div>