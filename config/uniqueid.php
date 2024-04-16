<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Minimum length
    |--------------------------------------------------------------------------
    |
    | This option defines the minimum length of the unique identifier. The
    | value provided here is used when generating the unique identifier.
    |
    */

    'min_length' => env('QUNIQUE_ID_MIN_LENGTH', 8),

    /*
    |--------------------------------------------------------------------------
    | Maximum length
    |--------------------------------------------------------------------------
    |
    | This option defines the maximum length of the unique identifier. The
    | value provided here is used when generating the unique identifier.
    | The maximum allowed value is 16.
    |
    */

    'max_length' => env('QUNIQUE_ID_MAX_LENGTH', 16),
];
