@if(method_exists($CategoryArcheticture, 'trashed') && $CategoryArcheticture->trashed())
        <a href="{{ route('dashboard.categoryarcheticture.trashed.show', $CategoryArcheticture->id) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@else
        <a href="{{ route('dashboard.categoryarcheticture.show', $CategoryArcheticture->id) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@endif