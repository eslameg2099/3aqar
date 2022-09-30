<x-layout :title="$estate->name" :breadcrumbs="['dashboard.estates.show', $estate]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('estates.attributes.name')</th>
                        <td>{{ $estate->name }}</td>
                    </tr>
                    @if($estate->getFirstMedia())
                        <tr>
                            <th width="200">@lang('estates.attributes.image')</th>
                            <td>
                                <file-preview :media="{{ $estate->getMediaResource() }}"></file-preview>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.estates.partials.actions.edit')
                    @include('dashboard.estates.partials.actions.delete')
                    @include('dashboard.estates.partials.actions.restore')
                    @include('dashboard.estates.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
        
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">صاحب العقار:</th>
                        <td>{{ $estate->user->name ?? '_'  }}</td>
                    </tr>
                    
                    <tr>
                        <th width="200">نوع العقار:</th>
                        <td>{{ $estate->estateType->name ?? '_'   }}</td>
                    </tr>
                    <tr>
                        <th width="200">سعر العقار:</th>
                        <td>{{ $estate->price }} ريال</td>
                    </tr>
                    <tr>
                        <th width="200">مساحه العقار:</th>
                        <td>{{ $estate->space }} متر </td>
                    </tr>
                    <tr>
                        <th width="200">مدينة العقار:</th>
                        <td>{{ $estate->city->name  }} </td>
        
                    </tr>
                    <tr>
                    <th width="200">العنوان بالكامل</th>
                       
                        <td>{{ $estate->cities[0]->name ?? '_'  }} /{{ $estate->cities[1]->name ?? '_'  }}/ {{ $estate->cities[2]->name ?? '_'  }} </td>
                    </tr>
                    
                    <tr>
                        <th width="200">عنوان العقار:</th>
                        <td>{{ $estate->address }} </td>
                    </tr>
                    <tr>
                        <th width="200">تاريخ الانشاء:</th>
                        <td>{{ $estate->created_at }} </td>
                    </tr>
                    <tr>
                        <th width="200">خط الطول:</th>
                        <td>{{ $estate->latitude }} </td>
                    </tr>
                    <tr>
                        <th width="200">خط العرض:</th>
                        <td>{{ $estate->longitude }} </td>
                    </tr>
                    <tr>
                        <th width="200">لينك الفيديو:</th>
                        <td>
                            <a  href="{{$estate->video }}" > لينك الفيديو </a>
                             </td>
                    </tr>
                    </tbody>
                </table>
<br>
<br>
<h2  width="200" style="text-align: center;"> خصائص اضافية </h2>
                <table class="table table-striped table-middle">
                    <tbody>
                  
                    @foreach($fields as $CustomField)
            <tr>
              
                <td>
                   
                        {{ $CustomField['key'] }} :
                    
                </td>
                <td>
                   
                {{ $CustomField['value'] }} 
               
           </td>
           <td>
                   
               @if($CustomField['check'] == 1)
                   يوجد
              
               @endif
           </td>
          @endforeach
                    </tbody>
                </table>
        


            @endcomponent
        </div>
        
    </div>
</x-layout>



