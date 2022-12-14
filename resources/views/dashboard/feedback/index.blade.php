<x-layout :title="trans('feedback.plural')" :breadcrumbs="['dashboard.feedback.index']">
    @include('dashboard.feedback.partials.filter')

    @component('dashboard::components.table-box')
        @slot('title')
            @lang('feedback.actions.list') ({{ count_formatted($feedback->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Feedback::class }}"
                            :resource="trans('feedback.plural')"></x-check-all-delete>
                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        <div>
                            @include('dashboard.feedback.partials.actions.read')
                        </div>
                        @include('dashboard.feedback.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('feedback.attributes.name')</th>
            <th>@lang('feedback.attributes.title')</th>
            <th>@lang('feedback.attributes.message')</th>
            <th>@lang('feedback.attributes.email')</th>

            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($feedback as $message)
            <tr class="{{ $message->read() ? 'tw-bg-gray-300' : 'font-weight-bold tw-bg-gray-100' }}">
                <td>
                    <x-check-all-item :model="$message"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.feedback.show', $message) }}"
                       class="text-decoration-none text-ellipsis">
                        {{ $message->name }}
                    </a>
                </td>
                <td>{{ $message->title }}</td>
                <td>{{ Str::limit($message->message, 10) }}</td>
                <td>{{ $message->email }}</td>

                
                <td style="width: 160px">
                    @include('dashboard.feedback.partials.actions.show', ['feedback' => $message])
                    @include('dashboard.feedback.partials.actions.delete', ['feedback' => $message])
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('feedback.empty')</td>
            </tr>
        @endforelse

        @if($feedback->hasPages())
            @slot('footer')
                {{ $feedback->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>
