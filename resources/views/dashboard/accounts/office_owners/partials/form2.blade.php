@include('dashboard.errors')
{{ BsForm::text('name') }}
{{ BsForm::text('email') }}
{{ BsForm::text('phone') }}
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}
<city-select value="{{ $officeOwner->city_id ?? old('city_id') }}"></city-select>


<fieldset class="border p-2 mb-4">
    <legend class="w-auto text-center px-2 lead">@lang('office_owners.office_info')</legend>
    {{ BsForm::text('office_name')->value($officeOwner->office->name ?? old('office_name')) }}
    
    {{ BsForm::textarea('office_description')->rows(3)->value($officeOwner->office->description ?? old('office_description')) }}
    <city-select value="{{ $officeOwner->office->city_id ?? old('city_id') }}"></city-select>

    {{ BsForm::checkbox('office_certified_at')->value(1)->checked($officeOwner->office->certified_at ?? false)->withDefault() }}
    {{ BsForm::checkbox('office_classified_at')->value(1)->checked($officeOwner->office->classified_at ?? false)->withDefault() }}
</fieldset>


@isset($officeOwner)


{{ BsForm::image('RequsetDischarges')
        ->collection('RequsetDischarges')
        ->files($officeOwner->getMediaResource('RequsetDischarges')) }}


    {{ BsForm::image('avatar')->collection('avatars')->files($officeOwner->getMediaResource('avatars')) }}
    {{ BsForm::image('office_commercial_register')
        ->collection('office_commercial_register')
        ->files($officeOwner->office->getMediaResource('office_commercial_register')) }}
    {{ BsForm::image('office_classification_certificate')->collection('office_classification_certificate')->files($officeOwner->office->getMediaResource('office_classification_certificate')) }}
@else
{{ BsForm::image('RequsetDischarges')
        ->collection('RequsetDischarges')
       }}


    {{ BsForm::image('avatar')->collection('avatars') }}
    {{ BsForm::image('office_commercial_register')->collection('office_commercial_register') }}
    {{ BsForm::image('office_classification_certificate')->collection('office_classification_certificate') }}
@endisset
