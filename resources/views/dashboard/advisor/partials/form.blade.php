@include('dashboard.errors')

       
<div class="form-group">
            {{ BsForm::number('price')
                ->value(request('price'))
                ->min(1)
                 ->label('سعر المتر') }}
        </div>
        <city-select value="{{ $advisor->city_id ?? old('city_id') }}"></city-select>

      

