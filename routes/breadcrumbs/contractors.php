<?php

Breadcrumbs::for('dashboard.contractors.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('contractors.plural'), route('dashboard.contractors.index'));
});

Breadcrumbs::for('dashboard.contractors.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.contractors.index');
    $breadcrumb->push(trans('contractors.trashed'), route('dashboard.contractors.trashed'));
});

Breadcrumbs::for('dashboard.contractors.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.contractors.index');
    $breadcrumb->push(trans('contractors.actions.create'), route('dashboard.contractors.create'));
});

Breadcrumbs::for('dashboard.contractors.show', function ($breadcrumb, $contractor) {
    $breadcrumb->parent('dashboard.contractors.index');
    $breadcrumb->push($contractor->name, route('dashboard.contractors.show', $contractor));
});

Breadcrumbs::for('dashboard.contractors.edit', function ($breadcrumb, $contractor) {
    $breadcrumb->parent('dashboard.contractors.show', $contractor);
    $breadcrumb->push(trans('contractors.actions.edit'), route('dashboard.contractors.edit', $contractor));
});
