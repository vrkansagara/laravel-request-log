<?php
return [
    /*
   |--------------------------------------------------------------------------
   | laravelRequestLog Settings
   |--------------------------------------------------------------------------
   |
   | laravelRequestLog is disabled by default, when enabled is set to true in app.php.
   | You can override the value by setting enable to true or false instead of null.
   |
   */
    'enabled' => env('VRKANSAGARA_LOG_REQUEST_AND_RESPONSE_ENABLED', false),

    'target_environment' => env('VRKANSAGARA_LOG_REQUEST_AND_RESPONSE_ENVIRONMENT', '')
];
