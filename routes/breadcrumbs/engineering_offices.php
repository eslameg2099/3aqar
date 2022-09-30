<?php

Breadcrumbs::for('dashboard.engineering_offices.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('engineering_offices.plural'), route('dashboard.engineering_offices.index'));
});

Breadcrumbs::for('dashboard.engineering_offices.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.engineering_offices.index');
    $breadcrumb->push(trans('engineering_offices.trashed'), route('dashboard.engineering_offices.trashed'));
});

Breadcrumbs::for('dashboard.engineering_offices.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.engineering_offices.index');
    $breadcrumb->push(trans('engineering_offices.actions.create'), route('dashboard.engineering_offices.create'));
});

Breadcrumbs::for('dashboard.engineering_offices.show', function ($breadcrumb, $engineering_office) {
    $breadcrumb->parent('dashboard.engineering_offices.index');
    $breadcrumb->push($engineering_office->name, route('dashboard.engineering_offices.show', $engineering_office));
});

Breadcrumbs::for('dashboard.engineering_offices.edit', function ($breadcrumb, $engineering_office) {
    $breadcrumb->parent('dashboard.engineering_offices.show', $engineering_office);
    $breadcrumb->push(trans('engineering_offices.actions.edit'), route('dashboard.engineering_offices.edit', $engineering_office));
});
