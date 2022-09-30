<x-layout :title="'طلبات التصميم'" :breadcrumbs="['dashboard.rquestarchetictures.index']">
    @include('dashboard.rquestarcheticture.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('experts.actions.list') ({{ $RrquestArchetictures->total() }})
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
            <th style="width: 30px;" class="text-center">
            </th>
            <th>اسم العميل</th>
            <th>نوع العقار</th>
            <th>المساحة</th>
            <th>تاريخ الانشاء</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($RrquestArchetictures as $RrquestArcheticture)
            <tr>
                <td class="text-center">
                </td>
                <td>
                    <a href="{{ route('dashboard.customers.show', $RrquestArcheticture->user) }}"
                       class="text-decoration-none text-ellipsis">

                     
                        {{ $RrquestArcheticture->user->name }}
                    </a>
                </td>
                <td>
                {{ $RrquestArcheticture->estateType->name }}
                </td>
                <td>
                {{ $RrquestArcheticture->space }}
                </td>
                <td>
                {{ $RrquestArcheticture->created_at  ?? '_' }}
                </td>
                <td style="width: 160px">
                @include('dashboard.rquestarcheticture.partials.actions.show')
                @include('dashboard.rquestarcheticture.partials.actions.edit')

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('experts.empty')</td>
            </tr>
        @endforelse

        @if($RrquestArchetictures->hasPages())
            @slot('footer')
                {{ $RrquestArchetictures->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
