<?php

Breadcrumbs::for('dashboard.estates.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('estates.plural'), route('dashboard.estates.index'));
});

Breadcrumbs::for('dashboard.estates.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.estates.index');
    $breadcrumb->push(trans('estates.trashed'), route('dashboard.estates.trashed'));
});

Breadcrumbs::for('dashboard.estates.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.estates.index');
    $breadcrumb->push(trans('estates.actions.create'), route('dashboard.estates.create'));
});

Breadcrumbs::for('dashboard.estates.show', function ($breadcrumb, $estate) {
    $breadcrumb->parent('dashboard.estates.index');
    $breadcrumb->push($estate->name, route('dashboard.estates.show', $estate));
});

Breadcrumbs::for('dashboard.estates.edit', function ($breadcrumb, $estate) {
    $breadcrumb->parent('dashboard.estates.show', $estate);
    $breadcrumb->push(trans('estates.actions.edit'), route('dashboard.estates.edit', $estate));
});

Breadcrumbs::for('dashboard.estates.sponser', function ($breadcrumb, $estate) {
    $breadcrumb->parent('dashboard.estates.index');
    $breadcrumb->push($estate->name, route('dashboard.estates.sponser', $estate));
});
