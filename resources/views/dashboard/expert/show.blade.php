<x-layout :title="$expert->name" :breadcrumbs="['dashboard.engineering_offices.show', $expert]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('experts.attributes.name')</th>
                        <td>{{ $expert->name }}</td>
                    </tr>
                  
                    <tr>
                        <th width="200">الايميل</th>
                        <td>{{ $expert->email }}</td>
                    </tr>
                    <tr>
                        <th width="200">المدينة</th>
                        <td>{{ $expert->city->name }}</td>
                    </tr>
                    <tr>
                    <th width="200">العنوان بالكامل</th>
                       
                        <td>{{ $expert->cities[0]->name ?? '_'  }} /{{ $expert->cities[1]->name ?? '_'  }}/ {{ $expert->cities[2]->name ?? '_'  }} </td>
                    </tr>
                    <tr>
                        <th width="200">الوصف</th>
                        <td>{{ $expert->description }}</td>
                    </tr>
                    @if($expert->getFirstMedia())
                        <tr>
                            <th width="200">@lang('experts.attributes.image')</th>
                            <td>
                                <file-preview :media="{{ $expert->getMediaResource() }}"></file-preview>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.expert.partials.actions.edit')
                    @include('dashboard.expert.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
