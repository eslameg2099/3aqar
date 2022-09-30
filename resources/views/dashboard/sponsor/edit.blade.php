<x-layout :title="$RequsetSponsor->id" :breadcrumbs="['dashboard.sponsors.show', $RequsetSponsor]">
    {{ BsForm::resource('sponsors')->putModel($RequsetSponsor, route('dashboard.sponsors.update', $RequsetSponsor)) }}
    @component('dashboard::components.box')
        @slot('title', 'تعديل')

        @include('dashboard.sponsor.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('cities.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>
