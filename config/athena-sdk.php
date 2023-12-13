<?php

// config for ChrisReedIO/Athena
return [
    'base_url' => env('ATHENA_BASE_URL', 'https://api.preview.platform.athenahealth.com'),
    'client_id' => env('ATHENA_CLIENT_ID', ''),
    'client_secret' => env('ATHENA_CLIENT_SECRET', ''),

    'practice_id' => env('ATHENA_PRACTICE_ID', ''),

    'leave_unprocessed' => env('ATHENA_LEAVE_UNPROCESSED'),
];
