<?php


return [
    'sendbox.client_id' => env('PAYPAL_SENDBOX_CLIENT_ID'),
    'sendbox.CECRET'    => env('PAYPAL_SENDBOX_CECRET'),


    'settings' => [
        'mode'          => env('PAYPAL_MODE', 'sendbox'),
        'http.ConnectionTimeOut'    => 3000,
        'log.LongEnabled'           => true,
        'log.FileName'              => storage_path() . '/logs/paypal.log',
        'log.logLaravel'            => ''
    ]
]


?>
