<x-layout :title="trans('contractors.trashed')" :breadcrumbs="['dashboard.contractors.trashed']">
    @include('dashboard.contractors.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('contractors.actions.list') ({{ $contractors->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <x-check-all-force-delete
                    type="{{ \App\Models\Contractor::class }}"
                    :resource="trans('contractors.plural')"></x-check-all-force-delete>
            <x-check-all-restore
                    type="{{ \App\Models\Contractor::class }}"
                    :resource="trans('contractors.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('contractors.attributes.name')</th>
            <th>@lang('contractors.attributes.email')</th>
            <th>@lang('contractors.attributes.phone')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($contractors as $contractor)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$contractor"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.contractors.trashed.show', $contractor) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $contractor->getFirstMediaUrl() }}"
                             alt="Image"
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $contractor->name }}
                    </a>
                </td>
                <td>{{ $contractor->email }}</td>
                <td>{{ $contractor->phone }}</td>

                <td style="width: 160px">
                    @include('dashboard.contractors.partials.actions.show')
                    @include('dashboard.contractors.partials.actions.restore')
                    @include('dashboard.contractors.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('contractors.empty')</td>
            </tr>
        @endforelse

        @if($contractors->hasPages())
            @slot('footer')
                {{ $contractors->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
