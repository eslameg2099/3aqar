<?php

Breadcrumbs::for('dashboard.orders.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('orders.plural'), route('dashboard.orders.index'));
});

Breadcrumbs::for('dashboard.orders.trashed', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.orders.index');
    $breadcrumb->push(trans('orders.trashed'), route('dashboard.orders.trashed'));
});

Breadcrumbs::for('dashboard.orders.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.orders.index');
    $breadcrumb->push(trans('orders.actions.create'), route('dashboard.orders.create'));
});

Breadcrumbs::for('dashboard.orders.show', function ($breadcrumb, $order) {
    $breadcrumb->parent('dashboard.orders.index');
    $breadcrumb->push($order->name, route('dashboard.orders.show', $order));
});

Breadcrumbs::for('dashboard.orders.edit', function ($breadcrumb, $order) {
    $breadcrumb->parent('dashboard.orders.show', $order);
    $breadcrumb->push(trans('orders.actions.edit'), route('dashboard.orders.edit', $order));
});
