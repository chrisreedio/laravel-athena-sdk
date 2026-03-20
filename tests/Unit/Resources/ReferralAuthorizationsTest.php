<?php

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Data\Patient\ReferralAuthorizationData;
use ChrisReedIO\AthenaSDK\Resources\Patients\ReferralAuthorizations;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('lists patient referral authorizations through the patient resource', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $mockClient = new MockClient([
        MockResponse::make([
            'referralauths' => [
                [
                    'referralauthid' => 501,
                    'departmentid' => 77,
                    'insuranceid' => '12345',
                    'appointmentids' => [9001, 9002],
                    'startdate' => '2026-03-01',
                    'expirationdate' => '2026-03-31',
                    'referralauthnumber' => 'AUTH-123',
                    'noreferralrequired' => false,
                    'specifiesvisits' => true,
                    'visitsapproved' => 6,
                    'visitsleft' => 4,
                ],
            ],
        ], 200),
    ]);

    $connector = (new AthenaConnector)->withMockClient($mockClient);
    $resource = new ReferralAuthorizations($connector, 34);

    $authorizations = $resource->list(
        showExpired: true,
        insuranceId: 12345,
    );

    $response = $mockClient->getRecordedResponses()[0];

    expect($authorizations)->toBeArray()
        ->and($authorizations)->toHaveCount(1)
        ->and($authorizations[0])->toBeInstanceOf(ReferralAuthorizationData::class)
        ->and($authorizations[0]->athenaId)->toBe(501)
        ->and($response->getPendingRequest()->query()->all())->toBe([
            'insuranceid' => 12345,
            'showexpired' => true,
        ]);
});
