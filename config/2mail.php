<?php

return [

    'default' => env('MAIL_MAILER', 'smtp'),

    'mailers' => [
        'mail' => [
            'transport' => 'mail',
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'encryption' => 'tls',
            'username' => 'squarem.limited@gmail.com',
            'password' => 'Pa55w0rd12#',
            'timeout' => null,
            'auth_mode' => null,
        ],

        'smtp' => [
            'transport' => 'smtp',
            'host' => 'smtp.gmail.com',
            'port' => 2525,
            'encryption' => 'tls',
            'username' => 'contact.squarem@gmail.com',
            'password' => 'emfaldyrijscdjvg',
            'timeout' => null,
            'auth_mode' => null,
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'mailgun' => [
            'transport' => 'mailgun',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => '/usr/sbin/sendmail -bs',
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],
    ],

    'from' => [
        'address' => 'hello@dlcikejacoop.com.ng',
        'name' => 'Contact DLC Ikeja',
    ],


    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    'stream' => [
        'ssl' => [
           'allow_self_signed' => true,
           'verify_peer' => false,
           'verify_peer_name' => false, 
        ],
    ],

];
