<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '1832187583688421',
    'client_secret' => '97bd7befff24433e6d4d5efb99b29a6c84',
    'redirect' => 'http://simple-projet-manager.dev/auth/facebook/callback',
    ],

     'twitter' => [
     'client_id' => '8hXoNQlOPXFGfZEutVAsysFc1',
     'client_secret' => 'VFbdb54v8lkOYI2KpFk1BGdeJpLE8gixJaZctMkg7jdWm6ur2ZnZ',
     'redirect' => 'http://simple-projet-manager.dev/auth/twitter/callback',
    ],

    'google' => [
     'client_id' => '96bd7489375532-of9qvaus4q6vbh5bvg97jvifl5pjiahp.apps.googleusercontent.com',
     'client_secret' => 'xj3WmPJu2kkLxeOGANbMcjLb',
     'redirect' => 'http://simple-projet-manager.dev/auth/google/callback',
    ],

    'github' => [
     'client_id' => 'cc94007a9b1fa65e759b',
     'client_secret' => '17bd65e5c95ed29b8bc6c7efeca98c8db2408c35af',
     'redirect' => 'http://simple-projet-manager.dev/auth/github/callback',
    ],

];
