<x-layout :title="$contractor->name" :breadcrumbs="['dashboard.contractors.show', $contractor]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('contractors.attributes.name')</th>
                        <td>{{ $contractor->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('contractors.attributes.description')</th>
                        <td>{{ $contractor->description }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('contractors.attributes.email')</th>
                        <td>{{ $contractor->email }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('contractors.attributes.phone')</th>
                        <td>{{ $contractor->phone }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('contractors.attributes.city_id')</th>
                        <td>@include('dashboard.cities.partials.actions.link', ['city' => $contractor->city])</td>
                    </tr>
                    <tr>
                    <th width="200">العنوان بالكامل</th>
                       
                        <td>{{ $contractor->cities[0]->name ?? '_'  }} /{{ $contractor->cities[1]->name ?? '_'  }}/ {{ $contractor->cities[2]->name ?? '_'  }} </td>
                    </tr>
                    @if($contractor->getFirstMedia())
                        <tr>
                            <th width="200">@lang('contractors.attributes.image')</th>
                            <td>
                                <file-preview :media="{{ $contractor->getMediaResource() }}"></file-preview>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.contractors.partials.actions.edit')
                    @include('dashboard.contractors.partials.actions.delete')
                    @include('dashboard.contractors.partials.actions.restore')
                    @include('dashboard.contractors.partials.actions.forceDelete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
