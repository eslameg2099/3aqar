<x-layout :title="$city->name" :breadcrumbs="['dashboard.cities.show', $city]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">@lang('cities.attributes.name')</th>
                        <td>{{ $city->name }}</td>
                        
                    </tr>
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.cities.partials.actions.edit')
                    @include('dashboard.cities.partials.actions.delete')
                    @include('dashboard.cities.partials.actions.restore')

                @endslot


            @endcomponent
            
            @if($count < 3)
            {{ BsForm::resource('cities')->post(route('dashboard.cities.store')) }}
    @component('dashboard::components.box')
        @slot('title', trans('cities.actions.create'))

        @include('dashboard.cities.partials.form3')
       <input type="hidden"  name="parent_id" value="{{$city->id}}">
        @slot('footer')
            {{ BsForm::submit()->label(trans('cities.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
        </div>
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
              مدن فرعية
            </div>
          </th>
        </tr>
        <tr>
           
            <th>@lang('cities.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
                    <tbody>
                    @forelse($cities as $sku)
            <tr>
              
                <td>
                  
                        {{ $sku->name }}
                   
                </td>

                <td style="width: 160px">
                @include('dashboard.cities.partials.actions.shownew')

                @include('dashboard.cities.partials.actions.deletenew')


                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('cities.empty')</td>
            </tr>
        @endforelse
                    </tbody>
                </table>

            @endcomponent
            @endif

        </div>
    </div>
</x-layout>
