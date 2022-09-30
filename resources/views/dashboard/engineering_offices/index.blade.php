<x-layout :title="trans('engineering_offices.plural')" :breadcrumbs="['dashboard.engineering_offices.index']">
    @include('dashboard.engineering_offices.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('engineering_offices.actions.list') ({{ $engineering_offices->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
              <div class="d-flex">
                 

                  <div class="ml-2 d-flex justify-content-between flex-grow-1">
                      @include('dashboard.engineering_offices.partials.actions.create')
                      @include('dashboard.engineering_offices.partials.actions.trashed')
                  </div>
              </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
            </th>
            <th>@lang('engineering_offices.attributes.name')</th>
            <th>الايميل</th>
            <th>رقم الهاتف</th>
            <th>المدينة</th>
            <th>الحالة</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($engineering_offices as $engineering_office)
            <tr>
                <td class="text-center">
                </td>
                <td>
                    <a href="{{ route('dashboard.engineering_offices.show', $engineering_office) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $engineering_office->getFirstMediaUrl() }}"
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $engineering_office->name }}
                    </a>
                </td>
                <td>
                {{ $engineering_office->email }}
                </td>
                <td>
                {{ $engineering_office->phone }}
                </td>
                <td>
                {{ $engineering_office->city->name ?? '_'  }}
                </td>
                <td>
                    @if($engineering_office->stauts == 1)
                    <span class="badge badge-success">مقبول</span>

  
                    @else
  منتظر رد
                    @endif
                </td>
                <td style="width: 200px">
                    @include('dashboard.engineering_offices.partials.actions.show')
                    @include('dashboard.engineering_offices.partials.actions.edit')
                    @include('dashboard.engineering_offices.partials.actions.delete')
                    @if($engineering_office->stauts == '0' )
                    @include('dashboard.engineering_offices.partials.actions.active')
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('engineering_offices.empty')</td>
            </tr>
        @endforelse

        @if($engineering_offices->hasPages())
            @slot('footer')
                {{ $engineering_offices->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
