<?php

// config for ChrisReedIO/Athena
return [
    'base_url' => env('ATHENA_BASE_URL', 'https://api.preview.platform.athenahealth.com'),
    'client_id' => env('ATHENA_CLIENT_ID', ''),
    'client_secret' => env('ATHENA_CLIENT_SECRET', ''),

    'practice_id' => env('ATHENA_PRACTICE_ID', ''),

    'leave_unprocessed' => env('ATHENA_LEAVE_UNPROCESSED'),

    'rate_limit_per_second' => (int) env(
        'ATHENA_RATE_LIMIT_PER_SECOND',
        app()->environment('production') ? 150 : 15
    ),
    'rate_limit_fallback_seconds' => (int) env('ATHENA_RATE_LIMIT_FALLBACK_SECONDS', 5),
    'rate_limit_max_delay_seconds' => (int) env('ATHENA_RATE_LIMIT_MAX_DELAY_SECONDS', 120),
    'rate_limit_jitter_factor' => (float) env('ATHENA_RATE_LIMIT_JITTER_FACTOR', 0.15),
    'rate_limit_job_tries' => (int) env('ATHENA_RATE_LIMIT_JOB_TRIES', 6),
    'rate_limit_job_backoff_base_seconds' => (int) env('ATHENA_RATE_LIMIT_JOB_BACKOFF_BASE_SECONDS', 2),
    'rate_limit_job_backoff_multiplier' => (float) env('ATHENA_RATE_LIMIT_JOB_BACKOFF_MULTIPLIER', 2.0),
    'rate_limit_job_backoff_max_seconds' => (int) env('ATHENA_RATE_LIMIT_JOB_BACKOFF_MAX_SECONDS', 120),
    'rate_limit_command_retry_attempts' => (int) env('ATHENA_RATE_LIMIT_COMMAND_RETRY_ATTEMPTS', 3),
];
