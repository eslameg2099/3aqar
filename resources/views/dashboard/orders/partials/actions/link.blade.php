@if($order)
    @if(method_exists($order, 'trashed') && $order->trashed())
        <a href="{{ route('dashboard.orders.trashed.show', $order) }}" class="text-decoration-none text-ellipsis">
            {{ $order->name }}
        </a>
    @else
        <a href="{{ route('dashboard.orders.show', $order) }}" class="text-decoration-none text-ellipsis">
            {{ $order->name }}
        </a>
    @endif
@else
    ---
@endif