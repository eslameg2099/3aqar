@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard.home'))
    @slot('icon', 'fas fa-tachometer-alt')
    @slot('active', request()->routeIs('dashboard.home'))
@endcomponent

@include('dashboard.cities.partials.actions.sidebar')
@include('dashboard.accounts.sidebar')
@include('dashboard.accounts.office_owners.sidebar')

@include('dashboard.types.partials.actions.sidebar')
@include('dashboard.CustomFields.partials.actions.sidebar')
@include('dashboard.advisor.partials.actions.sidebar')
@include('dashboard.categoryarcheticture.partials.actions.sidebar')
@include('dashboard.archeticture.partials.actions.sidebar')

@include('dashboard.estates.partials.actions.sidebar')
@include('dashboard.calculator.partials.actions.sidebar')
@include('dashboard.contractors.partials.actions.sidebar')
@include('dashboard.report.partials.actions.sidebar')
@include('dashboard.accountbank.partials.actions.sidebar')

@include('dashboard.sponsor.partials.actions.sidebar')
@include('dashboard.orders.partials.actions.sidebar')
 @include('dashboard.engineering_offices.partials.actions.sidebar')
 @include('dashboard.expert.partials.actions.sidebar')
 @include('dashboard.rquestarcheticture.partials.actions.sidebar')

{{-- The sidebar of generated crud will set here: Don't remove this line --}}
@include('dashboard.feedback.partials.actions.sidebar')
@include('dashboard.settings.sidebar')
