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
        'app_id'         => '806954689360296',
        'app_secret_key' => 'b59545b6d0cf7862737beda9d5b835fb'
    ],

    'peerjs' => [
        'api_key' => 'a70rdfino7ehr529'
    ]

];
