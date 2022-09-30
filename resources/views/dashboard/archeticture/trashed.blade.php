<x-layout :title="trans('Archeticture.trashed')" :breadcrumbs="['dashboard.archeticture.trashed']">
    @include('dashboard.archeticture.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('Archeticture.actions.list') ({{ $Archetictures->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            
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
                    <a href="{{ route('dashboard.experts.show', $Archeticture) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $Archeticture->getFirstMediaUrl() }}"
                            
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $Archeticture->name }}
                    </a>
                </td>
                <td>
                {{ $Archeticture->category->name }}
                </td>
               
                <td>
                {{ $Archeticture->type->name }}
                </td>

                <td style="width: 160px">
                    @include('dashboard.archeticture.partials.actions.show')
                    @include('dashboard.archeticture.partials.actions.restore')
                    @include('dashboard.archeticture.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('Archeticture.empty')</td>
            </tr>
        @endforelse

        @if($Archetictures->hasPages())
            @slot('footer')
                {{ $Archetictures->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
