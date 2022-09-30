<x-layout :title="trans('types.trashed')" :breadcrumbs="['dashboard.types.trashed']">
    @include('dashboard.types.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('types.actions.list') ({{ $types->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
              <x-check-all-force-delete
                      type="{{ \App\Models\Type::class }}"
                      :resource="trans('types.plural')"></x-check-all-force-delete>
              <x-check-all-restore
                      type="{{ \App\Models\Type::class }}"
                      :resource="trans('types.plural')"></x-check-all-restore>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('types.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($types as $type)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$type"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.types.trashed.show', $type) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $type->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.types.partials.actions.restore')
                    @include('dashboard.types.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('types.empty')</td>
            </tr>
        @endforelse

        @if($types->hasPages())
            @slot('footer')
                {{ $types->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
