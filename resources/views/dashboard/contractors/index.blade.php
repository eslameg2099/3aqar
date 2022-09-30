<x-layout :title="trans('contractors.plural')" :breadcrumbs="['dashboard.contractors.index']">
    @include('dashboard.contractors.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('contractors.actions.list') ({{ $contractors->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
              

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.contractors.partials.actions.create')
                    @include('dashboard.contractors.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
          
            <th>@lang('contractors.attributes.name')</th>
            <th>@lang('contractors.attributes.email')</th>
            <th>@lang('contractors.attributes.phone')</th>
            <th>الحالة</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($contractors as $contractor)
            <tr>
               
                <td>
                    <a href="{{ route('dashboard.contractors.show', $contractor) }}"
                       class="text-decoration-none text-ellipsis">

                       
                        {{ $contractor->name }}
                    </a>
                </td>
                <td>{{ $contractor->email }}</td>
                <td>{{ $contractor->phone }}</td>
                <td>
                    @if($contractor->stauts == 1)
                    <span class="badge badge-success">مقبول</span>

  
                    @else
  منتظر رد
                    @endif
                </td>

                <td style="width: 200px">
                    @include('dashboard.contractors.partials.actions.show')
                    @include('dashboard.contractors.partials.actions.edit')
                    @include('dashboard.contractors.partials.actions.delete')
                    @if($contractor->stauts == '0' )
                    @include('dashboard.contractors.partials.actions.active')
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('contractors.empty')</td>
            </tr>
        @endforelse

        @if($contractors->hasPages())
            @slot('footer')
                {{ $contractors->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
