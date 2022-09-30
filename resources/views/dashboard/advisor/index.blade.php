<x-layout :title="trans('cities.plural')" :breadcrumbs="['dashboard.cities.index']">
    @include('dashboard.cities.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('cities.actions.list') ({{ $advisors->total() }})
        @endslot

        <thead>
        <tr>
          <th colspan="100">
            <div class="d-flex">
               

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.advisor.partials.actions.create')
                </div>
            </div>
          </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
            #
            </th>
            <th>@lang('cities.attributes.name')</th>
            <th>سعر المتر</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($advisors as $advisor)
            <tr>
                <td> {{ $advisor->id }} </td>
               
                <td>
                    <a href="{{ route('dashboard.cities.show', $advisor) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $advisor->city->name ?? '_'  }}
                    </a>
                </td>
       <td>
       {{ $advisor->price }} ريال
      </td>
                <td style="width: 160px">
                    @include('dashboard.advisor.partials.actions.show')
                    @include('dashboard.advisor.partials.actions.edit')
                    @include('dashboard.advisor.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('cities.empty')</td>
            </tr>
        @endforelse

        @if($advisors->hasPages())
            @slot('footer')
                {{ $advisors->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
