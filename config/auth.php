<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'akuns',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'akuns',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'akuns',
            'hash' => false,
        ],

        'akun' => [
            'driver' => 'session',
            'provider' => 'akuns',
        ],
    ],

    'providers' => [
        'akuns' => [
            'driver' => 'eloquent',
            'model' => App\Models\Akun::class,
        ],
    ],

    'passwords' => [
        'akuns' => [
            'provider' => 'akuns',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
