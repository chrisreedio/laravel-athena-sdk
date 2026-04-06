<?php

use ChrisReedIO\AthenaSDK\Tests\TestCase;
use DateTimeImmutable;
use Illuminate\Support\Facades\Cache;
use Saloon\Http\Auth\AccessTokenAuthenticator;

uses(TestCase::class)->in(__DIR__);

function athenaTestConfig(array $overrides = []): array
{
    $config = array_merge([
        'base_url' => 'https://example.athena.test',
        'client_id' => 'test-client-id',
        'client_secret' => 'test-client-secret',
        'practice_id' => '195900',
        'leave_unprocessed' => true,
    ], $overrides);

    config()->set('athena-sdk', $config);

    return $config;
}

function cacheAthenaToken(string $token = 'test-access-token'): AccessTokenAuthenticator
{
    $authenticator = new AccessTokenAuthenticator($token, null, new DateTimeImmutable('+1 hour'));

    Cache::put('athena_access_token', $authenticator, now()->addHour());

    return $authenticator;
}
