<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun'  => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses'      => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe'   => [
        'model'  => 'App\User',
        'secret' => '',
    ],

    'facebook' => [
        'client_id'     => env('FACEBOOK_CLIENT_ID', '806954689360296'),
        'client_secret' => env('FACEBOOK_SECRET', 'b59545b6d0cf7862737beda9d5b835fb'),
        'redirect'      => url('oauth/facebook/callback')
    ],

    'twitter'  => [
        'client_id'     => env('TWITTER_CLIENT_ID', 'bzBLoUhuOoelmc13jZPPxg'),
        'client_secret' => env('TWITTER_SECRET', 'MDjZhYHmExgYdPUWzzAMsQE3gDR5Wze1NhjbThgB0'),
        'redirect'      => url('oauth/twitter/callback')
    ],

    'peerjs'   => [
    'api_key' => 'a70rdfino7ehr529'
]

];
