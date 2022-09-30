<x-layout :title="trans('cities.plural')" :breadcrumbs="['dashboard.cities.index']">
    @include('dashboard.cities.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('cities.actions.list') ({{ $cities->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\City::class }}"
                        :resource="trans('cities.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.cities.partials.actions.create')
                    @include('dashboard.cities.partials.actions.trashed')
                </div>
            </div>
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
                    <a href="{{ route('dashboard.cities.show', $city) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $city->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.cities.partials.actions.show')
                    @if($city->active == '1' )
                    @include('dashboard.cities.disactive')
                    @elseif($city->active == '0' )
                    @include('dashboard.cities.active')
                    @endif
                    @include('dashboard.cities.partials.actions.edit')
                    @include('dashboard.cities.partials.actions.delete')
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
