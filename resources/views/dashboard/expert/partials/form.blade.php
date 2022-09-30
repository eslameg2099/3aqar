@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
{{ BsForm::textarea('description')->attribute('class', 'form-control textarea') }}


@endBsMultilangualFormTabs

{{ BsForm::text('email') }}
{{ BsForm::text('phone') }}
<city-select value="{{ $expert->city_id ?? old('city_id') }}"></city-select>

@isset($expert)
    {{ BsForm::image('image')->files($expert->getMediaResource()) }}
@else
    {{ BsForm::image('image') }}
@endisset

