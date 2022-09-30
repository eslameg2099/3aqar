<?php

Breadcrumbs::for('dashboard.cities.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('cities.plural'), route('dashboard.cities.index'));
});

Breadcrumbs::for('dashboard.cities.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.cities.index');
    $breadcrumb->push(trans('cities.trashed'), route('dashboard.cities.trashed'));
});

Breadcrumbs::for('dashboard.cities.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.cities.index');
    $breadcrumb->push(trans('cities.actions.create'), route('dashboard.cities.create'));
});

Breadcrumbs::for('dashboard.cities.show', function ($breadcrumb, $city) {
    $breadcrumb->parent('dashboard.cities.index');
    $breadcrumb->push($city->name, route('dashboard.cities.show', $city));
});

Breadcrumbs::for('dashboard.cities.edit', function ($breadcrumb, $city) {
    $breadcrumb->parent('dashboard.cities.show', $city);
    $breadcrumb->push(trans('cities.actions.edit'), route('dashboard.cities.edit', $city));
});
