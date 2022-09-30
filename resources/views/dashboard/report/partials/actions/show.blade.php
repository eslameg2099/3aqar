@if(method_exists($report, 'trashed') && $report->trashed())
        <a href="{{ route('dashboard.reports.trashed.show', $report) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@else
        <a href="{{ route('dashboard.reports.show', $report) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@endif


