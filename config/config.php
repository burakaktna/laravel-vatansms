<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Credentials
    |--------------------------------------------------------------------------
    |
    | If you're using API credentials, change these settings. Get your
    | credentials from https://www.oztekbayi.com/panel/ | 'Settings'.
    |
    */

    'customer_no' => function_exists('env') ? env('VATANSMS_CUSTOMER_NO', '') : '',
    'username'    => function_exists('env') ? env('VATANSMS_USERNAME', '') : '',
    'password'    => function_exists('env') ? env('VATANSMS_PASSWORD', '') : '',
    'originator'  => function_exists('env') ? env('VATANSMS_ORIGINATOR', '') : '',
];
