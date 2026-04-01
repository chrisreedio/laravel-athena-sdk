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
                    'id' => 'row-1',
                    'insuranceid' => '123',
                    'insuranceidnumber' => 'ABC123456',
                    'insuredidnumber' => 'MEM-7788',
                    'ircid' => 40,
                    'ircname' => 'SELF PAY',
                    'insurancepayername' => 'Aetna',
                    'insurancetype' => 'Self Pay',
                    'insuranceproducttype' => 'PPO',
                    'insuranceplandisplayname' => 'SELF PAY DISPLAY',
                    'insuranceplanname' => 'SELF PAY',
                    'insurancephone' => '800-555-1212',
                    'insurancepackagepayerid' => 'PAYER-99',
                    'eligibilitylastchecked' => '2026-03-31',
                    'eligibilityreason' => 'Active coverage confirmed',
                    'eligibilitymessage' => 'Member is eligible',
                    'recenteligibilitytrackid' => 'track-123',
                    'relationshiptoinsuredid' => 1,
                    'relationshiptoinsured' => 'Self',
                    'eligibilitystatus' => 'Eligible',
                    'insurancepackageid' => 9001,
                    'sequencenumber' => 1,
                    'casepolicytypename' => 'Standard Policy',
                    'issuedate' => '2026-01-01',
                    'note' => 'Verified with payer',
                    'confidentialitycode' => 'normal',
                    'insurancepackageaddress1' => '1 Insurance Way',
                    'insurancepackagecity' => 'Austin',
                    'insurancepackagestate' => 'TX',
                    'insurancepackagezip' => '78701',
                    'insurancepolicyholder' => 'John Doe',
                    'insurancepolicyholderaddress1' => '2 Policy Holder Ln',
                    'insurancepolicyholdercity' => 'Dallas',
                    'insurancepolicyholdercountrycode' => 'US',
                    'insurancepolicyholdercountryiso3166' => 'USA',
                    'insurancepolicyholderdob' => '1980-01-02',
                    'insurancepolicyholderfirstname' => 'John',
                    'insurancepolicyholdermiddlename' => 'Q',
                    'insurancepolicyholderlastname' => 'Doe',
                    'insurancepolicyholdersex' => 'M',
                    'insurancepolicyholderstate' => 'TX',
                    'insurancepolicyholderzip' => '75001',
                    'insuredaddress' => '3 Covered Person Dr',
                    'insuredcity' => 'Houston',
                    'insuredcountrycode' => 'US',
                    'insuredcountryiso3166' => 'USA',
                    'insureddob' => '1980-01-02',
                    'insuredentitytypeid' => 2,
                    'insuredfirstname' => 'Jane',
                    'insuredlastname' => 'Doe',
                    'insuredsex' => 'F',
                    'insuredstate' => 'TX',
                    'insuredzip' => '77001',
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
        ->and($insurances[0]->id)->toBe('row-1')
        ->and($insurances[0]->insuranceId)->toBe('123')
        ->and($insurances[0]->insuranceIdNumber)->toBe('ABC123456')
        ->and($insurances[0]->insuredIdNumber)->toBe('MEM-7788')
        ->and($insurances[0]->payerName)->toBe('Aetna')
        ->and($insurances[0]->productType)->toBe('PPO')
        ->and($insurances[0]->planDisplayName)->toBe('SELF PAY DISPLAY')
        ->and($insurances[0]->phone)->toBe('800-555-1212')
        ->and($insurances[0]->packagePayerId)->toBe('PAYER-99')
        ->and($insurances[0]->eligibilityLastChecked)->toBe('2026-03-31')
        ->and($insurances[0]->eligibilityReason)->toBe('Active coverage confirmed')
        ->and($insurances[0]->eligibilityMessage)->toBe('Member is eligible')
        ->and($insurances[0]->recentEligibilityTrackId)->toBe('track-123')
        ->and($insurances[0]->packageId)->toBe(9001)
        ->and($insurances[0]->casePolicyTypeName)->toBe('Standard Policy')
        ->and($insurances[0]->issueDate)->toBe('2026-01-01')
        ->and($insurances[0]->note)->toBe('Verified with payer')
        ->and($insurances[0]->confidentialityCode)->toBe('normal')
        ->and($insurances[0]->insurancePolicyHolderMiddleName)->toBe('Q')
        ->and($insurances[0]->insuredFirstName)->toBe('Jane')
        ->and($response->getPendingRequest()->query()->all())->toBe([
            'departmentid' => 12,
            'ignorerestrictions' => true,
        ]);
});
