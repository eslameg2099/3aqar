<x-layout :title="trans('types.plural')" :breadcrumbs="['dashboard.types.index']">
    @include('dashboard.types.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('types.actions.list') ({{ $types->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete
                        type="{{ \App\Models\Type::class }}"
                        :resource="trans('types.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.types.partials.actions.create')
                    @include('dashboard.types.partials.actions.trashed')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
              <x-check-all></x-check-all>
            </th>
            <th>@lang('types.attributes.name')</th>
            <th>النوع</th>

            <th style="width: 200px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($types as $type)
            <tr>
                <td class="text-center">
                  <x-check-all-item :model="$type"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.types.show', $type) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $type->name }}
                    </a>
                </td>

              

                <td>
                    @if($type->type == "0")

                    <span class="badge badge-info"> ايجار</span>
                    @else

                    <span class="badge badge-dark"> بيع</span>

                    @endif
                </td>


                <td style="width: 160px">
                    @include('dashboard.types.partials.actions.show')
                    @if($type->active == '1' )
                    @include('dashboard.types.partials.actions.disactive')
                    @elseif($type->active == '0' )
                    @include('dashboard.types.partials.actions.active')
                    @endif
                    @include('dashboard.types.partials.actions.addoption')

                    @include('dashboard.types.partials.actions.edit')
                    @include('dashboard.types.partials.actions.delete')
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
