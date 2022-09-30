@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
{{ BsForm::textarea('description')->attribute('class', 'form-control textarea') }}

@endBsMultilangualFormTabs

{{ BsForm::text('email') }}
{{ BsForm::text('phone') }}
<city-select value="{{ $contractor->city_id ?? old('city_id') }}"></city-select>

@isset($contractor)
    {{ BsForm::image('image')->files($contractor->getMediaResource()) }}
@else
    {{ BsForm::image('image') }}
@endisset

