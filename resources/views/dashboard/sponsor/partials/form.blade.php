@include('dashboard.errors')

           
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th >#</th>
                        <td>{{ $RequsetSponsor->id }}</td>
                    </tr>
                    <th>اسم العميل:</th>

                    <td>{{ $RequsetSponsor->user->name }} </td>
                    <tr>
                    <th>النوع:</th>

<td>{{ $RequsetSponsor->type }} </td>
</tr>
<tr>
<th>العقار:</th>

<td>
<a href="{{ route('dashboard.estates.show', $RequsetSponsor->estate->id) }}" class="btn btn-outline-dark btn-sm">
<i class="fas far fa-building"></i>
</a>
    </td>
</tr>
<tr>
<th>الطلب:</th>

<td>
    @if($RequsetSponsor->stauts == 'create')
    <span class="badge badge-secondary">منتظر رد</span>

    @elseif($RequsetSponsor->stauts == 'current')
    <span class="badge badge-success">حالي</span>

    @else

    <span class="badge badge-danger">منتهي</span>

    @endif

</td>
</tr>
<tr>
<th> تاريخ الانتهاء:</th>

<td>



@if($RequsetSponsor->sponser_at != null)
<input type="date" name="date" class="form-control" value="{{($RequsetSponsor->sponser_at)->format('Y-m-d')}}">
@else
<input type="date" name="date" class="form-control" value="">

@endif

    
</td>
</tr>
<tr>
<th>الحالة:</th>

<td>
    @if($RequsetSponsor->active == '1')
    <span class="badge badge-success">مفعل</span>

  

    @else

    <span class="badge badge-danger">غير مفعل</span>

    @endif

</td>





                    </tbody>
                </table>
             
                @isset($RequsetSponsor)
{{ BsForm::image('image')->files($RequsetSponsor->getMediaResource()) }}
@else
{{ BsForm::image('image') }}
@endisset
