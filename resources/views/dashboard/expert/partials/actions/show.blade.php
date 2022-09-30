@if(method_exists($expert, 'trashed') && $expert->trashed())
        <a href="{{ route('dashboard.experts.trashed.show', $expert) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@else
        <a href="{{ route('dashboard.experts.show', $expert) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@endif


