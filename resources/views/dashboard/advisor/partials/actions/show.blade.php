@if(method_exists($advisor->id, 'trashed') && $advisor->trashed())
        <a href="{{ route('dashboard.advisor.trashed.show', $advisor->id) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@else
        <a href="{{ route('dashboard.advisor.show', $advisor->id) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@endif