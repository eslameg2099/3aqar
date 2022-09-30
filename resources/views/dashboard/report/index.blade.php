<x-layout :title="trans('report.plural')" :breadcrumbs="['dashboard.reports.index']">
    @include('dashboard.report.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('experts.actions.list') ({{ $reports->total() }})
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
           
            <th>العميل</th>
            <th>ابلاغ عن</th>
            <th>الاجراء</th>

            <th>تاريخ الانشاء</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($reports as $report)
            <tr>
                
                <td>
                    <a href="{{ route('dashboard.customers.show', $report->user) }}"
                       class="text-decoration-none text-ellipsis">

                       
                        {{ $report->user->name ?? '_'  }}
                    </a>
                </td>
                <td>
                    @if($report->type == 'estate')
                    <span class="badge badge-info"> عقار</span>
                    @elseif($report->type == 'engineeringoffice')
                    <span class="badge badge-success">  مكتب هندسي</span>
                    @elseif($report->type == 'contractor')
                    <span class="badge badge-success">  مقاول</span>
                    @elseif($report->type == 'expert')
                    <span class="badge badge-success"> مقيم</span>
                    
                    @elseif($report->type == 'estateoffice')
                    <span class="badge badge-success">  مكتب عقاري</span>
                    @endif
                </td>
                <td>
                    @if($report->status == '0')
                    <span class="badge badge-info"> بدون</span>

                    @else
                    <span class="badge badge-success">  تم اتخاد اجراء</span>

                    @endif
                </td>
                
                <td>
                {{ $report->created_at }}
                </td>
              
                 <td>
                    @include('dashboard.report.partials.actions.show')
                    @include('dashboard.report.partials.actions.edit')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('experts.empty')</td>
            </tr>
        @endforelse

        @if($reports->hasPages())
            @slot('footer')
                {{ $reports->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
