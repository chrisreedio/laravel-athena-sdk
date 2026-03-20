<?php

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Resources\Patients\PatientInsurances;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('lists patient insurances through the patient insurances resource', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $mockClient = new MockClient([
        MockResponse::make([
            'insurances' => [
                [
                    'insuranceid' => '123',
                    'ircid' => 40,
                    'ircname' => 'SELF PAY',
                    'insurancetype' => 'Self Pay',
                    'insuranceplanname' => 'SELF PAY',
                    'relationshiptoinsuredid' => 1,
                    'relationshiptoinsured' => 'Self',
                    'eligibilitystatus' => 'Eligible',
                    'packageid' => 9001,
                    'sequencenumber' => 1,
                ],
            ],
        ], 200),
    ]);

    $connector = (new AthenaConnector)->withMockClient($mockClient);
    $resource = new PatientInsurances($connector, 34);

    $insurances = $resource->list(
        departmentId: 12,
        ignoreRestrictions: true,
        showCancelled: false,
    );

    $response = $mockClient->getRecordedResponses()[0];

    expect($insurances)->toBeArray()
        ->and($response->getPendingRequest()->query()->all())->toBe([
            'departmentid' => 12,
            'ignorerestrictions' => true,
        ]);
});
