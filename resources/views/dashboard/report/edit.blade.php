<x-layout :title="$report->user->name" :breadcrumbs="['dashboard.reports.edit', $report]">
    {{ BsForm::resource('reports')->putModel($report, route('dashboard.reports.update', $report)) }}
    @component('dashboard::components.box')
        @slot('title', trans('report.actions.edit'))

        @include('dashboard.report.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label(trans('report.actions.save')) }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}
</x-layout>