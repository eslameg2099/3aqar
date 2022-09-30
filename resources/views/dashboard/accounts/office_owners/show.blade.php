<x-layout :title="$officeOwner->name" :breadcrumbs="['dashboard.office_owners.show', $officeOwner]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('office_owners.attributes.name')</th>
                <td>{{ $officeOwner->name }}</td>

                
            </tr>
            <tr>
                <th width="200">عدد طلبات الاعلان شهريا</th>
                <td>{{ $count_Sponsors }} / {{ $count_setting}}</td>

                
            </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.email')</th>
                <td>{{ $officeOwner->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.phone')</th>
                <td>
                    @include('dashboard.accounts.office_owners.partials.flags.phone')
                </td>
            </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.city_id')</th>
                <td>
                    @include('dashboard.cities.partials.actions.link', ['city' => $officeOwner->city])
                </td>
            </tr>
            <tr>
            <th width="200">العنوان بالكامل</th>
                       
                        <td>{{ $officeOwner->cities[0]->name ?? '_'  }} /{{ $officeOwner->cities[1]->name ?? '_'  }}/ {{ $officeOwner->cities[2]->name ?? '_'  }} </td>
                    </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.office_name')</th>
                <td>{{ $officeOwner->office->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.office_description')</th>
                <td>{{ $officeOwner->office->description }}</td>
            </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.office_city_id')</th>
                <td>
                    @include('dashboard.cities.partials.actions.link', ['city' => $officeOwner->office->city])
                </td>
            </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.office_certified_at')</th>
                
                <td>
                    @if($officeOwner->office->certified_at != null )

                    <x-boolean :is="$officeOwner->office->certified_at"></x-boolean>
                    @else
                    @include('dashboard.accounts.office_owners.partials.actions.certified')

                    @endif
                    
                </td>
            </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.office_classified_at')</th>
                <td>
                @if($officeOwner->office->classified_at != null )

                    <x-boolean :is="$officeOwner->office->classified_at"></x-boolean>
                    @else
                    
                    @include('dashboard.accounts.office_owners.partials.actions.classified')

                    @endif
                </td>
            </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.avatar')</th>
                <td>
                    @if($officeOwner->getFirstMedia('avatars'))
                        <file-preview :media="{{ $officeOwner->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $officeOwner->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $officeOwner->name }}">
                    @endif
                </td>
            </tr>
            <tr>
                <th width="200">@lang('office_owners.attributes.RequsetDischarges')</th>
                <td>
                    @if($officeOwner->getFirstMedia('RequsetDischarges'))
                        <file-preview :media="{{ $officeOwner->getMediaResource('RequsetDischarges') }}"></file-preview>
                
                    @endif
                </td>
            </tr>
            @if($officeOwner->office->getFirstMedia('office_logo'))
                <tr>
                    <th width="200">@lang('office_owners.attributes.office_logo')</th>
                    <td>
                        <file-preview :media="{{ $officeOwner->office->getMediaResource('office_logo') }}"></file-preview>
                    </td>
                </tr>
            @endif
            
            @if($officeOwner->office->getFirstMedia('office_commercial_register'))
                <tr>
                    <th width="200">@lang('office_owners.attributes.office_commercial_register')</th>
                    <td>
                        <file-preview :media="{{ $officeOwner->office->getMediaResource('office_commercial_register') }}"></file-preview>
                    </td>
                </tr>
            @endif
            @if($officeOwner->office->getFirstMedia('office_classification_certificate'))
                <tr>
                    <th width="200">@lang('office_owners.attributes.office_classification_certificate')</th>
                    <td>
                        <file-preview :media="{{ $officeOwner->office->getMediaResource('office_classification_certificate') }}"></file-preview>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.office_owners.partials.actions.edit')
            @include('dashboard.accounts.office_owners.partials.actions.delete')
            @include('dashboard.accounts.office_owners.partials.actions.restore')
            @include('dashboard.accounts.office_owners.partials.actions.forceDelete')
        @endslot
    @endcomponent
</x-layout>
