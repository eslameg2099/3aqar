@include('dashboard.errors')

<label>الاسم</label>

{{ BsForm::text('titele')->required() }}
<label>الوصف</label>

{{ BsForm::text('description')->required() }}
<label>اسم الحساب</label>

{{ BsForm::text('name_account')->required() }}
<label>رقم الحساب</label>

{{ BsForm::text('num_account')->required() }}
<label>رقم الايبان</label>

{{ BsForm::text('num_iban')->required() }}

