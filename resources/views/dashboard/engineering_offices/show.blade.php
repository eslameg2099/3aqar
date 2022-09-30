<x-layout :title="$engineering_office->name" :breadcrumbs="['dashboard.engineering_offices.show', $engineering_office]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">اسم المكتب</th>
                        <td>{{ $engineering_office->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">الوصف</th>
                        <td>{{ $engineering_office->description }}</td>
                    </tr>
                    <tr>
                        <th width="200">الايميل</th>
                        <td>{{ $engineering_office->email }}</td>
                    </tr>
                    <tr>
                        <th width="200">المدينة</th>
                        <td>{{ $engineering_office->city->name  ?? '_' }}</td>
                    </tr>
                    <tr>
                    <th width="200">العنوان بالكامل</th>
                       
                        <td>{{ $engineering_office->cities[0]->name ?? '_'  }} /{{ $engineering_office->cities[1]->name ?? '_'  }}/ {{ $engineering_office->cities[2]->name ?? '_'  }} </td>
                    </tr>
            <tr>
                    @if($engineering_office->getFirstMedia())
                        <tr>
                            <th width="200">الصور</th>
                            <td>
                                <file-preview :media="{{ $engineering_office->getMediaResource() }}"></file-preview>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.engineering_offices.partials.actions.edit')
                    @include('dashboard.engineering_offices.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
