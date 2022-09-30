<x-layout :title="trans('cities.trashed')" :breadcrumbs="['dashboard.cities.trashed']">
    @include('dashboard.cities.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('cities.actions.list') ({{ $cities->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
              <x-check-all-force-delete
                      type="{{ \App\Models\City::class }}"
                      :resource="trans('cities.plural')"></x-check-all-force-delete>
              <x-check-all-restore
                      type="{{ \App\Models\City::class }}"
                      :resource="trans('cities.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('cities.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($cities as $city)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$city"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.cities.trashed.show', $city) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $city->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.cities.partials.actions.restore')
                    @include('dashboard.cities.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('cities.empty')</td>
            </tr>
        @endforelse

        @if($cities->hasPages())
            @slot('footer')
                {{ $cities->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
