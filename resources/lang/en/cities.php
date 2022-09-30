<?php

return [
    'singular' => 'City',
    'plural' => 'Cities',
    'empty' => 'There are no cities yet.',
    'levels' => [
        '1' => 'Region',
        '2' => 'City',
        '3' => 'Neighborhood',
    ],
    'count' => 'Cities Count.',
    'search' => 'Search',
    'select' => 'Select City',
    'permission' => 'Manage cities',
    'trashed' => 'Trashed cities',
    'perPage' => 'Results Per Page',
    'filter' => 'Search for city',
    'actions' => [
        'list' => 'List All',
        'create' => 'Create a new city',
        'show' => 'Show city',
        'edit' => 'Edit city',
        'delete' => 'Delete city',
        'restore' => 'Restore',
        'forceDelete' => 'Delete Forever',
        'options' => 'Options',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The city has been created successfully.',
        'updated' => 'The city has been updated successfully.',
        'deleted' => 'The city has been deleted successfully.',
        'restored' => 'The city has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'City name',
        '%name%' => 'City name',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the city ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the city ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the city forever ?',
            'confirm' => 'Delete Forever',
            'cancel' => 'Cancel',
        ],
    ],
];
