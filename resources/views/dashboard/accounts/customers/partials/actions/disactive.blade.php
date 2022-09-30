@if(method_exists($customer, 'trashed') && $customer->trashed())
    @can('view', $customer)
        <a href="{{ route('dashboard.customers.disactive', $customer) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-down"></i>
        </a>
    @endcan
@else
    @can('view', $customer)
        <a href="{{ route('dashboard.customers.disactive', $customer) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-thumbs-down"></i>
        </a>
    @endcan
@endif