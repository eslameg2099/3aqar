<x-layout :title="$CustomField->name" :breadcrumbs="['dashboard.customers.show', $CustomField]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('customfield.attributes.name'):</th>
                <td>{{ $CustomField->name }}</td>
            </tr>
            <tr>
                <th width="200">طريقة العرض:</th>
                <td>{{ $CustomField->type }}</td>
            </tr>
            <tr>
                <th width="200">مطلوب:</th>
                <td>
                @if($CustomField->required == 1)
                    <span class="badge badge-success">نعم</span>

  
                    @else
  لا
                    @endif                </td>
            </tr>
          
            </tbody>
        </table>

        <br>
        <br>
        <br>

      
        <table class="table table-striped table-middle " >
            <div style="  text-align: center;
">
         <h2  >   الخيارات </h2>
         <a href="{{ route('dashboard.option.create', request()->only('type')) }}" class="btn btn-outline-success btn-lg">
        <i class="fas fa fa-fw fa-plus"></i>
      اضافة خيار
    </a>

</div>
<br>
            <tbody>
            @forelse($options as $CustomField)
            <tr>
              
                <td>
                   
                        {{ $CustomField->name }}
                    
                </td>

             
               

                
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">لا يوجد</td>
            </tr>
        @endforelse
            </tr>
          
            </tbody>
        </table>

      
      

        @slot('footer')
        
           
        @endslot

        
    @endcomponent
</x-layout>
