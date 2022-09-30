<x-layout :title="'الخصائص'" :breadcrumbs="['dashboard.customfield.index']">
    @include('dashboard.CustomFields.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('customfield.actions.list') ({{ count_formatted($CustomFields->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\CustomField::class }}"
                            :resource="trans('customers.plural')"></x-check-all-delete>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.CustomFields.partials.actions.create')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>الاسم </th>
            <th class="d-none d-md-table-cell">النوع</th>
            <th>مطلوب</th>
        </tr>
        </thead>
        <tbody>
        @forelse($CustomFields as $CustomField)
            <tr>
                <td>
                    <x-check-all-item :model="$CustomField"></x-check-all-item>
                </td>
                <td>
                   
                        {{ $CustomField->name }}
                    
                </td>

                <td class="d-none d-md-table-cell">
              
                    
                    @if($CustomField->type == 'switch' )
                    التبديل
                    @elseif($CustomField->type == 'buttons')
                    ازرار
                    @elseif($CustomField->type == 'text')
                    نص
                    @elseif($CustomField->type == 'number')
رقم                    @endif
                </td>
                <td>
                    @if($CustomField->required == 1)
                    <span class="badge badge-success">نعم</span>

  
                    @else
  لا
                    @endif
                </td>
                <td>
                </td>

                  <td style="width: 160px">
                @include('dashboard.CustomFields.partials.actions.show')
                    @include('dashboard.CustomFields.partials.actions.edit')
                    @include('dashboard.CustomFields.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('customers.empty')</td>
            </tr>
        @endforelse

        @if($CustomFields->hasPages())
            @slot('footer')
                {{ $CustomFields->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
