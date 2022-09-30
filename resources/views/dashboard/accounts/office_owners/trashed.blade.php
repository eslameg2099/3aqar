<x-layout :title="trans('office_owners.trashed')" :breadcrumbs="['dashboard.office_owners.trashed']">
    @include('dashboard.accounts.office_owners.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('office_owners.actions.list') ({{ count_formatted($officeOwners->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\OfficeOwner::class }}"
                        :resource="trans('office_owners.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\OfficeOwner::class }}"
                        :resource="trans('office_owners.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('office_owners.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('office_owners.attributes.email')</th>
            <th>@lang('office_owners.attributes.phone')</th>
            <th>@lang('office_owners.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($officeOwners as $officeOwner)
            <tr>
                <td>
                    <x-check-all-item :model="$officeOwner"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.office-owners.trashed.show', $officeOwner) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.office_owners.partials.flags.svg')
                            </span>
                        <img src="{{ $officeOwner->getAvatar() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2">
                        {{ $officeOwner->name }}
                    </a>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $officeOwner->email }}
                </td>
                <td>
                    @include('dashboard.accounts.office_owners.partials.flags.phone')
                </td>
                <td>{{ $officeOwner->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.office_owners.partials.actions.show')
                    @include('dashboard.accounts.office_owners.partials.actions.restore')
                    @include('dashboard.accounts.office_owners.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('office_owners.empty')</td>
            </tr>
        @endforelse

        @if($officeOwners->hasPages())
            @slot('footer')
                {{ $officeOwners->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
