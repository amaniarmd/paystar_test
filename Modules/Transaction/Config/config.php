<?php

return [
    'name' => 'Transaction',
    'finnotech' => [
        'address' => env('FINNOTECH_ADDRESS'),
        'client_id' => env('FINNOTECH_CLIENT_ID'),
        'track_id' => env('FINNOTECH_TRACK_ID'),
        'successful_status_code' => 200
    ]
];
