<x-layout :title="trans('engineering_offices.trashed')" :breadcrumbs="['dashboard.engineering_offices.trashed']">
    @include('dashboard.engineering_offices.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('engineering_offices.actions.list') ({{ $engineering_offices->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
              <x-check-all-force-delete
                      type="{{ \App\Models\EngineeringOffice::class }}"
                      :resource="trans('engineering_offices.plural')"></x-check-all-force-delete>
              <x-check-all-restore
                      type="{{ \App\Models\EngineeringOffice::class }}"
                      :resource="trans('engineering_offices.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('engineering_offices.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($engineering_offices as $engineering_office)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$engineering_office"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.engineering_offices.trashed.show', $engineering_office) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $engineering_office->getFirstMediaUrl() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $engineering_office->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.engineering_offices.partials.actions.show')
                    @include('dashboard.engineering_offices.partials.actions.restore')
                    @include('dashboard.engineering_offices.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('engineering_offices.empty')</td>
            </tr>
        @endforelse

        @if($engineering_offices->hasPages())
            @slot('footer')
                {{ $engineering_offices->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
