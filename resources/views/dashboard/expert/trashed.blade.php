<x-layout :title="trans('experts.trashed')" :breadcrumbs="['dashboard.engineering_offices.trashed']">
    @include('dashboard.expert.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('experts.actions.list') ({{ $experts->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
            </th>
            <th>@lang('experts.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($experts as $expert)
            <tr>
                <td class="text-center">
                </td>
                <td>
                    <a href="{{ route('dashboard.experts.trashed.show', $expert) }}"
                       class="text-decoration-none text-ellipsis">

                        <img src="{{ $expert->getFirstMediaUrl() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2" style="height: 32px;">
                        {{ $expert->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.expert.partials.actions.show')
                    @include('dashboard.expert.partials.actions.restore')
                    @include('dashboard.expert.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('experts.empty')</td>
            </tr>
        @endforelse

        @if($experts->hasPages())
            @slot('footer')
                {{ $experts->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
