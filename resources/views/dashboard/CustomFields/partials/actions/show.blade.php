@if(method_exists($CustomField, 'trashed') && $CustomField->trashed())
        <a href="{{ route('dashboard.customfield.trashed.show', $CustomField) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    
@else
        <a href="{{ route('dashboard.customfield.show', $CustomField) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
@endif