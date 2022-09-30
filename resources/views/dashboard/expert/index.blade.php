<x-layout :title="trans('experts.plural')" :breadcrumbs="['dashboard.experts.index']">
    @include('dashboard.expert.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('experts.actions.list') ({{ $experts->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
              <div class="d-flex">
                 

                  <div class="ml-2 d-flex justify-content-between flex-grow-1">
                      @include('dashboard.expert.partials.actions.create')
                      @include('dashboard.expert.partials.actions.trashed')
                  </div>
              </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
            </th>
            <th>اسم المقيم</th>
            <th>الايميل</th>
            <th>رقم الهاتف</th>
            <th>المدينة</th>
            <th>الحالة</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($experts as $expert)
            <tr>
                <td class="text-center">
                </td>
                <td>
                    <a href="{{ route('dashboard.experts.show', $expert) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $expert->getFirstMediaUrl() }}"
                            
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $expert->name }}
                    </a>
                </td>
                <td>
                {{ $expert->email }}
                </td>
                <td>
                {{ $expert->phone }}
                </td>
                <td>
                {{ $expert->city->name  ?? '_' }}
                </td>
                <td>
                    @if($expert->stauts == 1)
                    <span class="badge badge-success">مقبول</span>

  
                    @else
  منتظر رد
                    @endif
                </td>
                <td style="width: 200px">
                    @include('dashboard.expert.partials.actions.show')
                    @include('dashboard.expert.partials.actions.edit')
                    @include('dashboard.expert.partials.actions.delete')
                    @if($expert->stauts == '0' )
                    @include('dashboard.expert.partials.actions.active')
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('experts.empty')</td>
            </tr>
        @endforelse

        @if($experts->hasPages())
            @slot('footer')
                {{ $experts->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
