<x-layout :title="trans('estates.plural')" :breadcrumbs="['dashboard.estates.index']">
    @include('dashboard.estates.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('estates.actions.list') ({{ $estates->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
               

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.estates.partials.actions.create')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
            </th>
            <th>رقم العقار</th>

            <th>@lang('estates.attributes.name')</th>
            <th>صاحب العقار</th>
            <th>نوع العقار</th>
            <th>المدينة</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($estates as $estate)
            <tr>
                <td class="text-center">
                </td>
                <td>
                {{ $estate->id ?? '_' }}

               </td>
                <td>
                    <a href="{{ route('dashboard.estates.show', $estate) }}"
                       class="text-decoration-none text-ellipsis">

                     
                        {{ $estate->name ?? '_'}}
                    </a>
                </td>

                <td>
                {{ $estate->user->name ?? '_' }}

               </td>
               <td>
                {{ $estate->estateType->name ?? '_' }}

               </td>
               <td>
                {{ $estate->city->name ?? '_' }}

               </td>
               
                <td style="width: 200px">
                    @include('dashboard.estates.partials.actions.makesponser')
                    @include('dashboard.estates.partials.actions.show')
                    @include('dashboard.estates.partials.actions.edit')
                    @include('dashboard.estates.partials.actions.delete')

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('estates.empty')</td>
            </tr>
        @endforelse

        @if($estates->hasPages())
            @slot('footer')
                {{ $estates->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
