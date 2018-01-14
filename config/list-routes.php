<?php

return [
    /*
     * The endpoint to access the routes.
     */
    'url' => 'testing/routes',

    /*
     * The methods to hide.
     */
    'hide_methods' => ['HEAD'],

    /*
     * The routes to hide with regular expression
     */
    'hide_matching' => ['#^_debugbar#', '#^_dusk#', '#^oauth#', '#^api/v1#', '#^gbarak/vcm/test#', '#^testing#'],
];
