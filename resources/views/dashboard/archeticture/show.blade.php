<x-layout :title="$Archeticture->name" :breadcrumbs="['dashboard.archeticture.show', $Archeticture]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('Archeticture.attributes.name')</th>
                        <td>{{ $Archeticture->name }}</td>
                    </tr>
                  
                    <tr>
                        <th width="200">نوع التصميم</th>
                        <td>{{ $Archeticture->category->name ?? '_' }}</td>
                    </tr>
                    <tr>
                        <th width="200">نوع العقار</th>
                        <td>{{ $Archeticture->type->name ?? '_'  }}</td>
                    </tr>
                    <tr>
                        <th width="200">الوصف</th>
                        <td>{{ $Archeticture->description }}</td>
                    </tr>
                    @if($Archeticture->getFirstMedia())
                        <tr>
                            <th width="200">@lang('Archeticture.attributes.image')</th>
                            <td>
                                <file-preview :media="{{ $Archeticture->getMediaResource() }}"></file-preview>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @slot('footer')
                  
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
