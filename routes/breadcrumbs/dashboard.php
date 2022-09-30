<?php

Breadcrumbs::for('dashboard.home', function ($breadcrumb) {
    $breadcrumb->push(trans('dashboard.home'), route('dashboard.home'));
});

Breadcrumbs::for('dashboard.sponsors.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('sponsor.plural'), route('dashboard.sponsors.index'));
   // $breadcrumb->push('dashboard.sponsors.index');
});
Breadcrumbs::for('dashboard.sponsors.show', function ($breadcrumb, $city) {
    $breadcrumb->parent('dashboard.sponsors.index');
    $breadcrumb->push($city->id, route('dashboard.sponsors.show', $city));
});
Breadcrumbs::for('dashboard.experts.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('experts.plural'), route('dashboard.experts.index'));

});
Breadcrumbs::for('dashboard.experts.edit', function ($breadcrumb, $expert) {
    $breadcrumb->parent('dashboard.experts.index');
    $breadcrumb->push($expert->id, route('dashboard.experts.edit', $expert));
});

Breadcrumbs::for('dashboard.categoryarcheticture.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('CategoryArcheticture.plural'), route('dashboard.categoryarcheticture.index'));
});
Breadcrumbs::for('dashboard.categoryarcheticture.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.categoryarcheticture.index');
    $breadcrumb->push(trans('CategoryArcheticture.trashed'), route('dashboard.categoryarcheticture.trashed'));
});
Breadcrumbs::for('dashboard.categoryarcheticture.show', function ($breadcrumb,$CategoryArcheticture) {
    $breadcrumb->parent('dashboard.categoryarcheticture.index');
    $breadcrumb->push($CategoryArcheticture->id, route('dashboard.categoryarcheticture.show', $CategoryArcheticture));
});

Breadcrumbs::for('dashboard.categoryarcheticture.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.categoryarcheticture.index');
    $breadcrumb->push(trans('CategoryArcheticture.create'), route('dashboard.categoryarcheticture.create'));
});

Breadcrumbs::for('dashboard.categoryarcheticture.edit', function ($breadcrumb, $CategoryArcheticture) {
    $breadcrumb->parent('dashboard.categoryarcheticture.index');
    $breadcrumb->push($CategoryArcheticture->name, route('dashboard.categoryarcheticture.edit', $CategoryArcheticture));
});


Breadcrumbs::for('dashboard.archeticture.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('Archeticture.plural'), route('dashboard.archeticture.index'));
});

Breadcrumbs::for('dashboard.archeticture.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.archeticture.index');
    $breadcrumb->push(trans('Archeticture.create'), route('dashboard.archeticture.create'));
});


Breadcrumbs::for('dashboard.archeticture.show', function ($breadcrumb,$archeticture) {
    $breadcrumb->parent('dashboard.archeticture.index');
    $breadcrumb->push($archeticture->name, route('dashboard.archeticture.show', $archeticture));
});

Breadcrumbs::for('dashboard.archeticture.edit', function ($breadcrumb, $archeticture) {
    $breadcrumb->parent('dashboard.archeticture.index');
    $breadcrumb->push($archeticture->name, route('dashboard.archeticture.edit', $archeticture));
});

Breadcrumbs::for('dashboard.archeticture.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.archeticture.index');
    $breadcrumb->push(trans('Archeticture.trashed'), route('dashboard.archeticture.trashed'));
});



Breadcrumbs::for('dashboard.reports.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('report.plural'), route('dashboard.reports.index'));
});
Breadcrumbs::for('dashboard.reports.show', function ($breadcrumb,$report) {
    $breadcrumb->parent('dashboard.reports.index');
    $breadcrumb->push($report->id, route('dashboard.reports.show', $report));
});

Breadcrumbs::for('dashboard.reports.edit', function ($breadcrumb, $report) {
    $breadcrumb->parent('dashboard.reports.index');
    $breadcrumb->push($report->user->name, route('dashboard.reports.edit', $report));
});

Breadcrumbs::for('dashboard.customfield.index', function ($breadcrumb) {
    $breadcrumb->push(trans('customfield.plural'), route('dashboard.customfield.index'));
});
Breadcrumbs::for('dashboard.customfield.show', function ($breadcrumb,$customfield) {
    $breadcrumb->parent('dashboard.customfield.index');
    $breadcrumb->push($customfield->name, route('dashboard.customfield.show', $customfield));
});


Breadcrumbs::for('dashboard.rquestarchetictures.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push('طلبات التصميم', route('dashboard.rquestarchetictures.index'));
});

Breadcrumbs::for('dashboard.rquestarchetictures.show', function ($breadcrumb,$RrquestArcheticture) {
    $breadcrumb->parent('dashboard.rquestarchetictures.index');
    $breadcrumb->push($RrquestArcheticture, route('dashboard.rquestarchetictures.show', $RrquestArcheticture));
});

Breadcrumbs::for('dashboard.rquestarchetictures.edit', function ($breadcrumb, $RrquestArcheticture) {
    $breadcrumb->parent('dashboard.rquestarchetictures.index');
    $breadcrumb->push($RrquestArcheticture->user->name, route('dashboard.rquestarchetictures.edit', $RrquestArcheticture));
});

Breadcrumbs::for('dashboard.accountbank.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push('ابراء الذمة', route('dashboard.accountbank.index'));
});

