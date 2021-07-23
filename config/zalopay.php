<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ZaloPay Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    | "sandbox", "real"
    |
    */

    'env' => env('ZLP_ENV', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | App Identify
    |--------------------------------------------------------------------------
    |
    | The identifier for the application was given when registering the 
    | application with ZaloPay.
    |
    */

    'app_id' => env('ZLP_APP_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | Sub App Identify
    |--------------------------------------------------------------------------
    |
    | Service identifier / service group of partners registered with 
    | ZaloPay (only applicable to some special partners).
    |
    */

    'sub_app_id' => env('ZLP_SUB_APP_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | App User
    |--------------------------------------------------------------------------
    |
    | Identification information of the user of the order payment 
    | application: id/username/name/phone number/email of the user.
    | If not identifiable, default information such as application name 
    | can be used.
    |
    */

    'app_user' => env('ZLP_APP_USER', ''),

    /*
    |--------------------------------------------------------------------------
    | App Key 1
    |--------------------------------------------------------------------------
    |
    | Provided by ZaloPay to the application when registering the application.
    |
    */

    'key1' => env('ZLP_APP_KEY_FIRST', ''),

    /*
    |--------------------------------------------------------------------------
    | App Key 2
    |--------------------------------------------------------------------------
    |
    | Key 2 is provided for order verification.
    |
    */

    'key2' => env('ZLP_APP_KEY_SECOND', ''),

    /*
    |--------------------------------------------------------------------------
    | App Callback URL
    |--------------------------------------------------------------------------
    |
    | Zalopay will notify the payment status of the order when the payment
    | is completed; callback_url is called to notify failed or successful
    | payment result.
    |
    */

    'callback_url' => env('ZLP_CALLBACK_URL', 'payment/zlp/callback'),

    /*
    |--------------------------------------------------------------------------
    | ZaloPay Prefix Order
    |--------------------------------------------------------------------------
    |
    | This value will be the prefix for order.
    |
    */

    'prefix' => env('ZLP_PREFIX', ''),
    
];
