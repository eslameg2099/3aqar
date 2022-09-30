@if($estate->RequsetSponsor == null)

<a href="{{ route('dashboard.estates.sponser', $estate) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas far fa-flag"></i>
        </a>
        


        @endif