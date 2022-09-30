<x-layout :title="$type->name" :breadcrumbs="['dashboard.types.show', $type]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('types.attributes.name')</th>
                        <td>{{ $type->name }}</td>
                    </tr>
                   
                    </tbody>
                </table>


           



        </div>
    </div>
    <table class="table table-striped table-middle">

    <thead>
        
        <tr>
          <th colspan="100">
              
            <div class="d-flex">
              
            </div>
          </th>
        </tr>
        <tr>
        
            <th>الخاصية</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($x as $type)
            <tr>
             
                <td>
                  
                        {{ $type->option->name ?? '__'}}
                    
                </td>

                <td style="width: 160px">
                @include('dashboard.types.partials.actions.removeoption')


                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">لا يوجد</td>
            </tr>
        @endforelse
</tbody>

        </table>

        @if($x->hasPages())
            @slot('footer')
                {{ $x->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
