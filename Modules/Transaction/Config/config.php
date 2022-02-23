<?php

return [
    'name' => 'Transaction',
    'finnotech' => [
        'address' => env('FINNOTECH_ADDRESS', 'https://sandboxapi.finnotech.ir'),
        'client_id' => env('FINNOTECH_CLIENT_ID', 5),
        'track_id' => env('FINNOTECH_TRACK_ID', 45),
        'successful_status_code' => 200
    ]
];
