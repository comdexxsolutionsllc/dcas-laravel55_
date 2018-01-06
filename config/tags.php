<?php

return [
    /*
     * The given function generates a URL friendly "slug" from the tag name property before saving it.
     */
    'slugger' => env('SLUGGER_TAGS', 'str_slug'),
];
