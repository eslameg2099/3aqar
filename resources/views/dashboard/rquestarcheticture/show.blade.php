<x-layout :title="$RrquestArcheticture->user->name" :breadcrumbs="['dashboard.rquestarchetictures.show', $RrquestArcheticture->user->name]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')
            
                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">العميل</th>
                        <td>{{ $RrquestArcheticture->user->name }}</td>
                    </tr>
                  
                    <tr>
                        <th width="200">نوع العقار</th>
                        <td>{{ $RrquestArcheticture->estateType->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">المساحة</th>
                        <td>{{ $RrquestArcheticture->space }}</td>
                    </tr>
                    <tr>
                        <th width="200">الوصف</th>
                        <td>{{ $RrquestArcheticture->description }}</td>
                    </tr>
                    <tr>
                        <th width="200">الاجراء</th>
                        <td>   @if($RrquestArcheticture->status == '0')
                    <span class="badge badge-info"> بدون</span>

                    @else
                    <span class="badge badge-success">  تم اتخاد اجراء</span>

                    @endif
                    </td>
                    <tr>
                        <th width="200">التعليق </th>
                        <td>{{ $RrquestArcheticture->comment }}</td>
                    </tr>
                    <tr>
                        <th width="200">تاريخ الانشاء</th>
                        <td>{{ $RrquestArcheticture->created_at }}</td>
                    </tr>
                   
                    </tbody>
                    @slot('footer')
                    @include('dashboard.rquestarcheticture.partials.actions.edit')
                @endslot
                </table>

               
            @endcomponent
        </div>
    </div>
</x-layout>
