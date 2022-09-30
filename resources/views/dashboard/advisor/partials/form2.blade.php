@include('dashboard.errors')

@include('dashboard.errors')
<div class="form-group"> 
<label>سعر المنتج</label>
<input type="number" name="price"  class="form-control" value="{{ $advisor->price }}"  min="1" required>
</div>
<input Type="hidden" name="city_id " value="{{ $advisor->city_id  }}">

   
     