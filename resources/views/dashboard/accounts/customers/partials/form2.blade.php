@include('dashboard.errors')
{{ BsForm::text('name') }}
{{ BsForm::text('email') }}
{{ BsForm::text('phone') }}
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}
<city-select value="{{ $customer->city_id ?? old('city_id') }}"></city-select>

@isset($customer)
    {{ BsForm::image('avatar')->collection('avatars')->files($customer->getMediaResource('avatars')) }}

    {{ BsForm::image('RequsetDischarges')
        ->collection('RequsetDischarges')
        ->files($customer->getMediaResource('RequsetDischarges')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
    {{ BsForm::image('RequsetDischarges')
        ->collection('RequsetDischarges')
       }}
@endisset