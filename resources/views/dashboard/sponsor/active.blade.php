@if(method_exists($RequsetSponsor, 'trashed') && $RequsetSponsor->trashed())
        <a href="{{ route('dashboard.sponsors.active', $RequsetSponsor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-up"></i>
        </a>
@else
        <a href="{{ route('dashboard.sponsors.active', $RequsetSponsor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-up"></i>
        </a>
@endif