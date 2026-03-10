<?php

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\QualityMeasures\CreateQualityManagementRefresh;
use ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\QualityMeasures\GetPatientQualityManagement;
use ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\QualityMeasures\GetQualityManagementRefreshTime;
use ChrisReedIO\AthenaSDK\Resources\Chart;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('maps chart quality management calls to the intended request classes and query data', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $mockClient = new MockClient([
        MockResponse::make(),
        MockResponse::make(),
        MockResponse::make(),
    ]);

    $connector = (new AthenaConnector)->withMockClient($mockClient);
    $chart = new Chart($connector);

    $chart->getPatientQualityManagement(55, 'open', 77, 88, 'clinical');
    $chart->getQualityManagementRefreshTime(55, 77);
    $chart->createQualityManagementRefresh(55, 88, 77);

    $responses = $mockClient->getRecordedResponses();

    expect($responses[0]->getPendingRequest()->getRequest())->toBeInstanceOf(GetPatientQualityManagement::class)
        ->and($responses[0]->getPendingRequest()->query()->all())->toBe([
            'departmentid' => 77,
            'measuretype' => 'clinical',
            'providerid' => 88,
            'status' => 'open',
        ])
        ->and($responses[1]->getPendingRequest()->getRequest())->toBeInstanceOf(GetQualityManagementRefreshTime::class)
        ->and($responses[1]->getPendingRequest()->query()->all())->toBe([
            'departmentid' => 77,
        ])
        ->and($responses[2]->getPendingRequest()->getRequest())->toBeInstanceOf(CreateQualityManagementRefresh::class)
        ->and($responses[2]->getPendingRequest()->body()->all())->toBe([
            'departmentid' => 77,
            'providerid' => 88,
        ]);
});
