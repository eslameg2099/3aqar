@if(method_exists($RequsetSponsor, 'trashed') && $RequsetSponsor->trashed())
        <a href="{{ route('dashboard.sponsors.accept', $RequsetSponsor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-times-circle"></i>
        </a>
@else
        <a href="{{ route('dashboard.sponsors.accept', $RequsetSponsor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-times-circle"></i>
        </a>
@endif