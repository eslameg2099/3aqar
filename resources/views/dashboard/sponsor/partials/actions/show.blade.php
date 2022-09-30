@if(method_exists($RequsetSponsor, 'trashed') && $RequsetSponsor->trashed())
        <a href="{{ route('dashboard.sponsors.trashed.show', $RequsetSponsor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@else
        <a href="{{ route('dashboard.sponsors.show', $RequsetSponsor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@endif