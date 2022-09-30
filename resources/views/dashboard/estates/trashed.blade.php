<x-layout :title="trans('estates.trashed')" :breadcrumbs="['dashboard.estates.trashed']">
    @include('dashboard.estates.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('estates.actions.list') ({{ $estates->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Estate::class }}"
                    :resource="trans('estates.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Estate::class }}"
                    :resource="trans('estates.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('estates.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($estates as $estate)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$estate"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.estates.trashed.show', $estate) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $estate->getFirstMediaUrl() }}"
                             alt="Image"
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $estate->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.estates.partials.actions.show')
                    @include('dashboard.estates.partials.actions.restore')
                    @include('dashboard.estates.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('estates.empty')</td>
            </tr>
        @endforelse

        @if($estates->hasPages())
            @slot('footer')
                {{ $estates->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
