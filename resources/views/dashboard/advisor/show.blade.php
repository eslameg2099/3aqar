<x-layout :title="$advisor->city->name" :breadcrumbs="['dashboard.cities.show', $advisor->city]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">سعر المتر:</th>
                        <td>{{ $advisor->price }}</td>
                        
                    </tr>
                    </tbody>
                </table>

             


            @endcomponent
           
    </div>
</x-layout>
