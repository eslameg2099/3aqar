<x-layout :title="'مكاتب عقارية غبر مقبولة'" :breadcrumbs="['dashboard.office_owners.index']">
    @include('dashboard.accounts.office_owners.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('office_owners.actions.list') ({{ count_formatted($officeOwners->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\OfficeOwner::class }}"
                            :resource="trans('office_owners.plural')"></x-check-all-delete>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.accounts.office_owners.partials.actions.create')
                        @include('dashboard.accounts.office_owners.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('office_owners.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('office_owners.attributes.email')</th>
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
                    <a href="{{ route('dashboard.office-owners.show', $officeOwner) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.office_owners.partials.flags.svg')
                            </span>
                        <img src="{{ $officeOwner->getAvatar() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2">
                        {{ $officeOwner->office->name }}
                    </a>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $officeOwner->email }}
                </td>

            
                <td>{{ $officeOwner->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.office_owners.partials.actions.show')
                    @include('dashboard.accounts.office_owners.accept')

                    @include('dashboard.accounts.office_owners.partials.actions.edit')
                    @include('dashboard.accounts.office_owners.partials.actions.delete')
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
