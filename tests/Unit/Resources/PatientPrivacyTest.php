<?php

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Resources\Patients\PatientPrivacy;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('submits patient privacy information successfully when a signature datetime is provided', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $mockClient = new MockClient([
        MockResponse::make([], 200),
    ]);

    $connector = (new AthenaConnector)->withMockClient($mockClient);
    $privacy = new PatientPrivacy($connector, 12, 34);
    $signatureDatetime = new DateTime('2025-03-01 14:15:16');

    $result = $privacy->set(
        signatureName: 'Signed Name',
        signatureDatetime: $signatureDatetime,
        privacySignature: true,
        insuredSignature: false,
        patientSignature: true,
    );

    $response = $mockClient->getRecordedResponses()[0];

    expect($result)->toBeTrue()
        ->and($response->getPendingRequest()->body()->all())->toMatchArray([
            'departmentid' => 12,
            'patientsignature' => true,
            'privacynotice' => true,
        ]);
});
