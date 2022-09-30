<x-layout :title="$RequsetSponsor->id" :breadcrumbs="['dashboard.sponsors.show', $RequsetSponsor]">
    <div class="row">
           
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th >#</th>
                        <td>{{ $RequsetSponsor->id }}</td>
                    </tr>
                    <th>اسم العميل:</th>

                    <td>{{ $RequsetSponsor->user->name ?? '_'  }} </td>
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

<td>{{ $RequsetSponsor->sponser_at }}
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

<tr>
<th>الاجراء:</th>

    <td>
@if($RequsetSponsor->stauts == 'create' )
                    @include('dashboard.sponsor.accept')
                    @include('dashboard.sponsor.disaccept')
                    @endif
</td>
</tr>

<br>
</tr>



                    </tbody>
                </table>
                @if($RequsetSponsor->getFirstMedia())
                        <file-preview :media="{{ $RequsetSponsor->getMediaResource() }}"></file-preview>
                    
                    @endif
              
            @endcomponent
            
        </div>
    </div>
</x-layout>

