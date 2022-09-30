@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs
<div class="form-group">
                            <label>@lang('cities.city')</label>
                            <select name="parent_id" class="form-control">
                                @foreach ($cities as $category)

                                    <option value="{{ $category->id }}" @if($category->id == $city->parent_id)selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>