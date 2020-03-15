<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
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
    'facebook' => [
        'client_id' => '2515536808677261',
        'client_secret' => 'e37932815c11d4d12eddd74de23c3621',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
      ],
      'google' => [
        'client_id' => '510818137698-f45mkq5s8fq8vlnhpmtfgmi0coqvhfvf.apps.googleusercontent.com',
        'client_secret' => 'bfmZ2TGui1HyEeqQVk9NcB4E',
        'redirect' => 'http://localhost:8000/login/google/callback',
      ], 

];
