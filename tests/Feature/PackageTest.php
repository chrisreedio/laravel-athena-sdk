<?php

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Facades\Athena;
use ChrisReedIO\AthenaSDK\Resources\Appointments;

it('loads the published config defaults', function () {
    expect(config('athena-sdk.base_url'))->toBe('https://api.preview.platform.athenahealth.com')
        ->and(config('athena-sdk.client_id'))->toBe('')
        ->and(config('athena-sdk.client_secret'))->toBe('')
        ->and(config('athena-sdk.practice_id'))->toBe('')
        ->and(config('athena-sdk.leave_unprocessed'))->toBeNull();
});

it('resolves the connector and facade through the container', function () {
    athenaTestConfig();
    cacheAthenaToken();

    expect(app(AthenaConnector::class))->toBeInstanceOf(AthenaConnector::class)
        ->and(Athena::appointments())->toBeInstanceOf(Appointments::class);
});
