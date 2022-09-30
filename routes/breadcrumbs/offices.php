<?php

Breadcrumbs::for('dashboard.office_owners.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('office_owners.plural'), route('dashboard.office-owners.index'));
});

Breadcrumbs::for('dashboard.office_owners.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.office_owners.index');
    $breadcrumb->push(trans('office_owners.trashed'), route('dashboard.office-owners.trashed'));
});

Breadcrumbs::for('dashboard.office_owners.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.office_owners.index');
    $breadcrumb->push(trans('office_owners.actions.create'), route('dashboard.office-owners.create'));
});

Breadcrumbs::for('dashboard.office_owners.show', function ($breadcrumb, $office_owner) {
    $breadcrumb->parent('dashboard.office_owners.index');
    $breadcrumb->push($office_owner->name, route('dashboard.office-owners.show', $office_owner));
});

Breadcrumbs::for('dashboard.office_owners.edit', function ($breadcrumb, $office_owner) {
    $breadcrumb->parent('dashboard.office_owners.show', $office_owner);
    $breadcrumb->push(trans('office_owners.actions.edit'), route('dashboard.office-owners.edit', $office_owner));
});
