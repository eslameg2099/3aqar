<x-layout :title="trans('categoryarcheticture.trashed')" :breadcrumbs="['dashboard.categoryarcheticture.trashed']">
    @include('dashboard.categoryarcheticture.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('cities.actions.list') ({{ $CategoryArchetictures->total() }})
        @endslot

        <thead>
       
        <tr>
            <th>@lang('CategoryArcheticture.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($CategoryArchetictures as $CategoryArcheticture)
            <tr>
                
                <td>
                    <a href="{{ route('dashboard.cities.trashed.show', $CategoryArcheticture) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $CategoryArcheticture->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.categoryarcheticture.partials.actions.show')
                    @include('dashboard.categoryarcheticture.partials.actions.restore')
                    @include('dashboard.categoryarcheticture.partials.actions.forceDelete')
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
