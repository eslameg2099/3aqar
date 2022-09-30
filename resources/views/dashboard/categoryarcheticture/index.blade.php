<x-layout :title="trans('CategoryArcheticture.plural')" :breadcrumbs="['dashboard.categoryarcheticture.index']">
    @include('dashboard.categoryarcheticture.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('cities.actions.list') ({{ $CategoryArchetictures->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
               

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.categoryarcheticture.partials.actions.create')
                    @include('dashboard.categoryarcheticture.partials.actions.trashed')

                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
            #
            </th>
            <th>اسم النوع</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($CategoryArchetictures as $CategoryArcheticture)
            <tr>
                <td> {{ $CategoryArcheticture->id }} </td>
               
                <td>
                    <a href="{{ route('dashboard.categoryarcheticture.show', $CategoryArcheticture) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $CategoryArcheticture->name }}
                    </a>
                </td>
       <td>
      </td>
                <td style="width: 160px">
                @include('dashboard.categoryarcheticture.partials.actions.show')
                    @include('dashboard.categoryarcheticture.partials.actions.edit')
                    @include('dashboard.categoryarcheticture.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('CategoryArcheticture.empty')</td>
            </tr>
        @endforelse

        @if($CategoryArchetictures->hasPages())
            @slot('footer')
                {{ $CategoryArchetictures->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
