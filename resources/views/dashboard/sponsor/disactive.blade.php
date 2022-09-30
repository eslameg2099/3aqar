@if(method_exists($RequsetSponsor, 'trashed') && $RequsetSponsor->trashed())
        <a href="{{ route('dashboard.sponsors.disactive', $RequsetSponsor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-down"></i>
        </a>
@else
        <a href="{{ route('dashboard.sponsors.disactive', $RequsetSponsor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-down"></i>
        </a>
@endif