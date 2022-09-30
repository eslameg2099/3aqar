<?php

Breadcrumbs::for('dashboard.types.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('types.plural'), route('dashboard.types.index'));
});

Breadcrumbs::for('dashboard.types.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.types.index');
    $breadcrumb->push(trans('types.trashed'), route('dashboard.types.trashed'));
});

Breadcrumbs::for('dashboard.types.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.types.index');
    $breadcrumb->push(trans('types.actions.create'), route('dashboard.types.create'));
});

Breadcrumbs::for('dashboard.types.show', function ($breadcrumb, $type) {
    $breadcrumb->parent('dashboard.types.index');
    $breadcrumb->push($type->name, route('dashboard.types.show', $type));
});

Breadcrumbs::for('dashboard.types.edit', function ($breadcrumb, $type) {
    $breadcrumb->parent('dashboard.types.show', $type);
    $breadcrumb->push(trans('types.actions.edit'), route('dashboard.types.edit', $type));
});

Breadcrumbs::for('dashboard.types.assgin', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.types.index');
    $breadcrumb->push(trans('customfield.addcutom'), route('dashboard.types.index'));
});
