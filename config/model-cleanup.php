<?php

return [
    /*
     * All models that use the GetsCleanedUp interface in these directories will be cleaned.
     */
    'directories' => [
        app_path(),
        app_path('Modules' . DIRECTORY_SEPARATOR . 'SupportDesk' . DIRECTORY_SEPARATOR . 'Models'),
        app_path('Modules' . DIRECTORY_SEPARATOR . 'SystemMonitoring' . DIRECTORY_SEPARATOR . 'Models'),
        app_path('Modules' . DIRECTORY_SEPARATOR . 'VendorPanel' . DIRECTORY_SEPARATOR . 'Models'),
    ],

    /*
     * All models in this array that use the GetsCleanedUp interface will be cleaned.
     */
    'models' => [
        // App\LogItem::class,
    ],
];
