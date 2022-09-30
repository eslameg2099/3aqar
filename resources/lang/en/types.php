<?php

return [
    'singular' => 'Type',
    'plural' => 'Types',
    'empty' => 'There are no types yet.',
    'count' => 'Types Count.',
    'search' => 'Search',
    'select' => 'Select Type',
    'permission' => 'Manage types',
    'trashed' => 'Trashed types',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for type',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new type',
        'show' => 'Show type',
        'edit' => 'Edit type',
        'delete' => 'Delete type',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The type has been created successfully.',
        'updated' => 'The type has been updated successfully.',
        'deleted' => 'The type has been deleted successfully.',
        'restored' => 'The type has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Type name',
        '%name%' => 'Type name',
    ],
    'types' => [
        \App\Models\Type::RENT_TYPE => 'Rent',
        \App\Models\Type::SELLING_TYPE => 'Selling',
    ],
    'for' => [
        \App\Models\Type::RENT_TYPE => 'for rent',
        \App\Models\Type::SELLING_TYPE => 'for sell',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the type ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the type ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the type forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
