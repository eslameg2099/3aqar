<x-layout :title="$order->name" :breadcrumbs="['dashboard.orders.show', $order]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('orders.attributes.name')</th>
                        <td>{{ $order->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('orders.attributes.description')</th>
                        <td>{{ $order->description }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('orders.attributes.user_id')</th>
                        <td>
                            @include('dashboard.accounts.customers.partials.actions.link', ['customer' => $order->user])
                        </td>
                    </tr>
                    <tr>
                        <th width="200">نوع العقار</th>
                        <td>
                        {{ $order->estateType->name ?? '_'}}                        </td>
                    </tr>
                    <tr>
                        <th width="200">المدينة</th>
                        <td>
                        {{ $order->city->name ?? '_'}}                        </td>
                    </tr>
                    <tr>
                    <th width="200">العنوان بالكامل</th>
                       
                        <td>{{ $order->cities[0]->name ?? '_'  }} /{{ $order->cities[1]->name ?? '_'  }}/ {{ $order->cities[2]->name ?? '_'  }} </td>
                    </tr>
                    <tr>
                        <th width="200">@lang('orders.attributes.space_from')</th>
                        <td>{{ $order->space_from }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('orders.attributes.space_to')</th>
                        <td>{{ $order->space_to }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('orders.attributes.price_from')</th>
                        <td>{{ new \App\Support\Price($order->price_from) }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('orders.attributes.price_to')</th>
                        <td>{{ new \App\Support\Price($order->price_to) }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('orders.attributes.published_at')</th>
                        <td>{{ $order->published_at }}</td>
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.orders.partials.actions.edit')
                    @include('dashboard.orders.partials.actions.delete')
                    @include('dashboard.orders.partials.actions.restore')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
