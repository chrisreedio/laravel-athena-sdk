<?php

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Resources\Appointments;
use ChrisReedIO\AthenaSDK\Resources\Departments;
use ChrisReedIO\AthenaSDK\Resources\Encounters;
use ChrisReedIO\AthenaSDK\Resources\Patients;
use ChrisReedIO\AthenaSDK\Resources\Practice;
use ChrisReedIO\AthenaSDK\Resources\Providers;
use Illuminate\Support\Facades\Cache;

beforeEach(function () {
    Cache::forget('athena_access_token');
});

it('requires a base url in config', function () {
    athenaTestConfig(['base_url' => '']);

    expect(fn () => new AthenaConnector)->toThrow(Exception::class, 'Athena SDK base_url not set');
});

it('requires a practice id in config', function () {
    athenaTestConfig(['practice_id' => '']);

    expect(fn () => new AthenaConnector)->toThrow(Exception::class, 'Athena SDK practice_id not set');
});

it('builds the practice base url from config', function () {
    athenaTestConfig([
        'base_url' => 'https://example.athena.test',
        'practice_id' => '222333',
    ]);
    cacheAthenaToken();

    $connector = new AthenaConnector;

    expect($connector->resolveBaseUrl())->toBe('https://example.athena.test/v1/222333');
});

it('allows overriding the practice id in the constructor', function () {
    athenaTestConfig([
        'base_url' => 'https://example.athena.test',
        'practice_id' => '222333',
    ]);
    cacheAthenaToken();

    $connector = new AthenaConnector('999888');

    expect($connector->resolveBaseUrl())->toBe('https://example.athena.test/v1/999888');
});

it('creates top level resource accessors without contacting the network', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $connector = new AthenaConnector;

    expect($connector->appointments())->toBeInstanceOf(Appointments::class)
        ->and($connector->departments())->toBeInstanceOf(Departments::class)
        ->and($connector->patients())->toBeInstanceOf(Patients::class)
        ->and($connector->providers())->toBeInstanceOf(Providers::class)
        ->and($connector->referringProviders())->toBeInstanceOf(Providers\ReferringProviders::class)
        ->and($connector->practice())->toBeInstanceOf(Practice::class)
        ->and($connector->encounters())->toBeInstanceOf(Encounters::class);
});

it('uses a 15 requests-per-second limiter outside production', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $connector = new AthenaConnector;
    $limits = $connector->getLimits();

    $perSecondLimit = null;
    foreach ($limits as $limit) {
        if ($limit->getAllow() === 15 && $limit->getReleaseInSeconds() === 1) {
            $perSecondLimit = $limit;

            break;
        }
    }

    expect($perSecondLimit)->not->toBeNull()
        ->and($perSecondLimit->getAllow())->toBe(15)
        ->and($perSecondLimit->getReleaseInSeconds())->toBe(1)
        ->and($perSecondLimit->getShouldSleep())->toBeFalse();
});

it('uses a 150 requests-per-second limiter in production', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $originalEnvironment = app('env');
    app()->instance('env', 'production');

    try {
        $connector = new AthenaConnector;
        $limits = $connector->getLimits();

        $perSecondLimit = null;
        foreach ($limits as $limit) {
            if ($limit->getAllow() === 150 && $limit->getReleaseInSeconds() === 1) {
                $perSecondLimit = $limit;

                break;
            }
        }

        expect($perSecondLimit)->not->toBeNull()
            ->and($perSecondLimit->getAllow())->toBe(150)
            ->and($perSecondLimit->getReleaseInSeconds())->toBe(1)
            ->and($perSecondLimit->getShouldSleep())->toBeFalse();
    } finally {
        app()->instance('env', $originalEnvironment);
    }
});
