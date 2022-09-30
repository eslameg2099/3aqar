@if(method_exists($Archeticture, 'trashed') && $Archeticture->trashed())
        <a href="{{ route('dashboard.archeticture.trashed.show', $Archeticture) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@else
        <a href="{{ route('dashboard.archeticture.show', $Archeticture) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@endif


