<x-layout :title="$CategoryArcheticture->name" :breadcrumbs="['dashboard.categoryarcheticture.show', $CategoryArcheticture]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">اسم التصميم:</th>
                        <td>{{ $CategoryArcheticture->name}}</td>
                        
                    </tr>
                    @if($CategoryArcheticture->getFirstMedia())
                        <tr>
                            <th width="200">@lang('experts.attributes.image')</th>
                            <td>
                                <file-preview :media="{{ $CategoryArcheticture->getMediaResource() }}"></file-preview>
                            </td>
                        </tr>
                    @endif
                 
                    </tbody>
                   
                 

                </table>

             


            @endcomponent

            @include('dashboard.categoryarcheticture.partials.actions.edit')
                    @include('dashboard.categoryarcheticture.partials.actions.delete')
           
    </div>
</x-layout>
