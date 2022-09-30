<x-layout :title="trans('sponsor.plural')" :breadcrumbs="['dashboard.sponsors.index']">
    @include('dashboard.sponsor.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('cities.actions.list') ({{ $RequsetSponsors->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
             

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                  
                </div>
            </div>
          </th>
        </tr>
        <tr>
           
            <th>#</th>
            <th>اسم لعميل</th>

            <th>النوع</th>
            <th>العقار</th>
            <th>الطلب</th>

            <th>تاريخ الانتهاء</th>
            <th>الحالة</th>


            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($RequsetSponsors as $RequsetSponsor)
            <tr>
              
                <td>
                   
                        {{ $RequsetSponsor->id }}
                   
                </td>
                <td>
                    @if($RequsetSponsor->user->type == "customer")
                    <a href="{{ route('dashboard.customers.show', $RequsetSponsor->user) }}"
                       class="text-decoration-none text-ellipsis">

                       
                        {{ $RequsetSponsor->user->name ?? '_'  }}
                    </a>
                    @else
                    <a href="{{ route('dashboard.office-owners.show', $RequsetSponsor->user) }}"
                       class="text-decoration-none text-ellipsis">

                        {{ $RequsetSponsor->user->name   }}
                    </a>

                    @endif
                </td>

                <td>{{ $RequsetSponsor->type }} </td>
                <td>
                <a href="{{ route('dashboard.estates.show', $RequsetSponsor->estate->id) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas far fa-building"></i>
        </a>
                    </td>
                <td>
                    @if($RequsetSponsor->stauts == 'create')
                    <span class="badge badge-secondary">منتظر رد</span>

                    @elseif($RequsetSponsor->stauts == 'current')
                    <span class="badge badge-success">حالي</span>

                    @else

                    <span class="badge badge-danger">منتهي</span>

                    @endif

               </td>
                
         <td>{{ $RequsetSponsor->sponser_at }}
        </td>
        <td>
                    @if($RequsetSponsor->active == '1')
                    <span class="badge badge-success">مفعل</span>

                  

                    @else

                    <span class="badge badge-danger">غير مفعل</span>

                    @endif

               </td>
        
                
                
                
                <td style="width: 220px">
                @if($RequsetSponsor->active == '1' )
                    @include('dashboard.sponsor.disactive')
                    @elseif($RequsetSponsor->active == '0' )
                    @include('dashboard.sponsor.active')
                    @endif
                    @include('dashboard.sponsor.partials.actions.show')
                    @include('dashboard.sponsor.partials.actions.edit')

                    @include('dashboard.sponsor.partials.actions.delete')


                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('sponsor.empty')</td>
            </tr>
        @endforelse

        @if($RequsetSponsors->hasPages())
            @slot('footer')
                {{ $RequsetSponsors->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
