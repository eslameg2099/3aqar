@include('dashboard.errors')
@bsMultilangualFormTabs
{{ BsForm::text('name') }}
{{ BsForm::textarea('description') }}
@endBsMultilangualFormTabs
{{ BsForm::text('email') }}
{{ BsForm::text('phone') }}

<city-select value="{{ $engineering_office->city_id ?? old('city_id') }}"></city-select>

@isset($engineering_office)
    {{ BsForm::image('image')->files($engineering_office->getMediaResource()) }}
@else
    {{ BsForm::image('image') }}
@endisset

