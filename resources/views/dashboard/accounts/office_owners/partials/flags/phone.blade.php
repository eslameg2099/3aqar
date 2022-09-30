<div class="d-inline-flex align-items-center">
    <span class="mx-2">{{ $officeOwner->phone }}</span>
    @if($officeOwner->phone_verified_at)
        <span class="badge badge-success">@lang('users.verified')</span>
    @else
        <span class="badge badge-warning">@lang('users.unverified')</span>
    @endif
</div>