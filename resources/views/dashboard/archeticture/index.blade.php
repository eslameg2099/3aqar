<x-layout :title="trans('Archeticture.plural')" :breadcrumbs="['dashboard.archeticture.index']">
    @include('dashboard.archeticture.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('Archeticture.actions.list') ({{ $Archetictures->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
              <div class="d-flex">
                 

                  <div class="ml-2 d-flex justify-content-between flex-grow-1">
                      @include('dashboard.archeticture.partials.actions.create')
                      @include('dashboard.archeticture.partials.actions.trashed')
                  </div>
              </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
            </th>
            <th>التصميم</th>
            <th>النوع</th>
            <th>توع العفار</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($Archetictures as $Archeticture)
            <tr>
                <td class="text-center">
                </td>
                <td>
                    <a href="{{ route('dashboard.archeticture.show', $Archeticture) }}"
                       class="text-decoration-none text-ellipsis">

                    
                        {{ $Archeticture->name }}
                    </a>
                </td>
                <td>
                {{ $Archeticture->category->name ?? '_'  }}
                </td>
               
                <td>
                {{ $Archeticture->type->name ?? '_'  }}
                </td>
                <td style="width: 160px">
                @include('dashboard.archeticture.partials.actions.show')
                    @include('dashboard.archeticture.partials.actions.edit')
                    @include('dashboard.archeticture.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('experts.empty')</td>
            </tr>
        @endforelse

        @if($Archetictures->hasPages())
            @slot('footer')
                {{ $Archetictures->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
