<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    
    //https://console.cloud.google.com/apis/credentials/oauthclient/373111631182-q3k2eml775e02olqffq879idhdtdefhr.apps.googleusercontent.com?authuser=2&project=cleanfully-1580378064787
    'google' => [
        'client_id' => '373111631182-q3k2eml775e02olqffq879idhdtdefhr.apps.googleusercontent.com', 
        'client_secret' => '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', 
        'redirect' => 'http://127.0.0.1:8001/callback/google/',  // https://plutus-builder.markevans.work/callback/google/  ,  local  http://127.0.0.1:8001/callback/google/
    ],


];
