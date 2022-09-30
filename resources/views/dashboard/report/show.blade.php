<x-layout :title="$report->user->name" :breadcrumbs="['dashboard.reports.show', $report]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">العميل</th>
                        <td>{{ $report->user->name ?? '_'  }}</td>
                    </tr>
                    <tr>
                        <th width="200">النوع</th>
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
                    </tr>
                   
                    <tr>
                        <th > رابط المبلغ عنه</th>
                        <td width="200">
                    @if($report->type == 'estate')
                    <a href="{{ route('dashboard.estates.show', $report->estate) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a> 
                    @elseif($report->type == 'engineeringoffice')
                    <a href="{{ route('dashboard.engineering_offices.show', $report->engineeringoffice) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>                     @elseif($report->type == 'contractor')
        <a href="{{ route('dashboard.contractors.show', $report->contractor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>                     @elseif($report->type == 'expert')
                    <a href="{{ route('dashboard.experts.show', $report->expert) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>                        @elseif($report->type == 'estateoffice')
        <a href="{{ route('dashboard.office-owners.show', $report->OfficeOwner) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>                     @endif
                </td>
                    </tr>
                    <tr>
                        <th width="200">الاجراء</th>
                        <td>   @if($report->status == '0')
                    <span class="badge badge-info"> بدون</span>

                    @else
                    <span class="badge badge-success">  تم اتخاد اجراء</span>

                    @endif
                    </td>
                    <tr>
                        <th width="200">التعليق</th>
                        <td>{{ $report->comment  }}</td>
                    </tr>

                    <tr>
                        <th width="200">تاريخ الانشاء</th>
                        <td>{{ $report->created_at }}</td>
                    </tr>

                    </tr>

                    </tbody>
                    @slot('footer')
                    @include('dashboard.report.partials.actions.edit')
                @endslot
                </table>

            
            @endcomponent
        </div>
    </div>
</x-layout>
