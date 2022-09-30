<x-layout  :breadcrumbs="['dashboard.accountbank.index']">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    <tr>
                        <th width="200">الاسم: </th>
                        <td>{{ $AccountBank->titele }}</td>
                    </tr>
                    <tr>
                        <th width="200">الوصف:</th>
                        <td>{{ $AccountBank->description }}</td>
                    </tr>
                    <tr>
                        <th width="200">اسم الحساب:</th>
                        <td>{{ $AccountBank->name_account }}</td>
                    </tr>
                    <tr>
                        <th width="200">رقم الحساب:</th>
                        <td>{{ $AccountBank->num_account }}</td>
                    </tr>
                    <tr>
                        <th width="200">رقم الايبان:</th>
                        <td>{{ $AccountBank->num_iban }}</td>
                    </tr>

                    
                    @slot('footer')
                    @include('dashboard.accountbank.partials.actions.edit')


               @endslot
                    </tbody>
               
                </table>


           


              
        </div>
        
    </div>
   
    @endcomponent
</x-layout>
