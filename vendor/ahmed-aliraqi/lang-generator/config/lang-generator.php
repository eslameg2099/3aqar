<?php

return [
    'defaultLang' => 'en',

    /*
     * The lang files paths.
     */

    'lang' => [
        'auth' => resource_path('lang/{lang}/auth.php'),
        'pagination' => resource_path('lang/{lang}/pagination.php'),
        'passwords' => resource_path('lang/{lang}/passwords.php'),
        'validation' => resource_path('lang/{lang}/validation.php'),
    ],

    /*
     * The paths that will scanned for translations.
     */

    'matches' => [
        app_path(),
        resource_path('views'),
    ],
];