<?php

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\RiskContractReference\GetRiskContract;
use ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\RiskContractReference\UpdateRiskContract;
use ChrisReedIO\AthenaSDK\Resources\PopulationManagement;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('maps population management calls to the intended risk contract requests', function () {
    athenaTestConfig();
    cacheAthenaToken();

    $mockClient = new MockClient([
        MockResponse::make(),
        MockResponse::make(),
    ]);

    $connector = (new AthenaConnector)->withMockClient($mockClient);
    $populationManagement = new PopulationManagement($connector);

    $populationManagement->getRiskContract(99, 'Contract A');
    $populationManagement->updateRiskContract('Contract A', 'Description', 99);

    $responses = $mockClient->getRecordedResponses();

    expect($responses[0]->getPendingRequest()->getRequest())->toBeInstanceOf(GetRiskContract::class)
        ->and($responses[0]->getPendingRequest()->query()->all())->toBe([
            'name' => 'Contract A',
            'riskcontractid' => 99,
        ])
        ->and($responses[1]->getPendingRequest()->getRequest())->toBeInstanceOf(UpdateRiskContract::class)
        ->and($responses[1]->getPendingRequest()->body()->all())->toBe([
            'description' => 'Description',
            'name' => 'Contract A',
            'riskcontractid' => 99,
        ]);
});
