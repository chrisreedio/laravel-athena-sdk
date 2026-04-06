<?php

use ChrisReedIO\AthenaSDK\Data\Patient\InsuranceData;

it('maps the expanded patient insurance payload', function () {
    $insurance = InsuranceData::fromArray([
        'id' => 'row-1',
        'insuranceid' => '123',
        'insuranceidnumber' => 'ABC123456',
        'insuredidnumber' => 'MEM-7788',
        'ircid' => 40,
        'ircname' => 'SELF PAY',
        'insurancepayername' => 'Aetna',
        'insurancetype' => 'Self Pay',
        'insuranceproducttype' => 'PPO',
        'insuranceplandisplayname' => 'Self Pay Display',
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
    ]);

    expect($insurance->id)->toBe('row-1')
        ->and($insurance->athenaId)->toBe('123')
        ->and($insurance->insuranceId)->toBe('123')
        ->and($insurance->insuranceIdNumber)->toBe('ABC123456')
        ->and($insurance->insuredIdNumber)->toBe('MEM-7788')
        ->and($insurance->ircId)->toBe(40)
        ->and($insurance->ircName)->toBe('SELF PAY')
        ->and($insurance->payerName)->toBe('Aetna')
        ->and($insurance->type)->toBe('Self Pay')
        ->and($insurance->productType)->toBe('PPO')
        ->and($insurance->planDisplayName)->toBe('Self Pay Display')
        ->and($insurance->planName)->toBe('SELF PAY')
        ->and($insurance->phone)->toBe('800-555-1212')
        ->and($insurance->packagePayerId)->toBe('PAYER-99')
        ->and($insurance->eligibilityLastChecked)->toBe('2026-03-31')
        ->and($insurance->eligibilityReason)->toBe('Active coverage confirmed')
        ->and($insurance->eligibilityMessage)->toBe('Member is eligible')
        ->and($insurance->recentEligibilityTrackId)->toBe('track-123')
        ->and($insurance->relationshipToInsuredId)->toBe(1)
        ->and($insurance->relationshipToInsured)->toBe('Self')
        ->and($insurance->eligibilityStatus)->toBe('Eligible')
        ->and($insurance->packageId)->toBe(9001)
        ->and($insurance->sequenceNumber)->toBe(1)
        ->and($insurance->casePolicyTypeName)->toBe('Standard Policy')
        ->and($insurance->issueDate)->toBe('2026-01-01')
        ->and($insurance->note)->toBe('Verified with payer')
        ->and($insurance->confidentialityCode)->toBe('normal')
        ->and($insurance->insurancePackageAddress1)->toBe('1 Insurance Way')
        ->and($insurance->insurancePackageCity)->toBe('Austin')
        ->and($insurance->insurancePackageState)->toBe('TX')
        ->and($insurance->insurancePackageZip)->toBe('78701')
        ->and($insurance->insurancePolicyHolder)->toBe('John Doe')
        ->and($insurance->insurancePolicyHolderAddress1)->toBe('2 Policy Holder Ln')
        ->and($insurance->insurancePolicyHolderCity)->toBe('Dallas')
        ->and($insurance->insurancePolicyHolderCountryCode)->toBe('US')
        ->and($insurance->insurancePolicyHolderCountryIso3166)->toBe('USA')
        ->and($insurance->insurancePolicyHolderDob)->toBe('1980-01-02')
        ->and($insurance->insurancePolicyHolderFirstName)->toBe('John')
        ->and($insurance->insurancePolicyHolderMiddleName)->toBe('Q')
        ->and($insurance->insurancePolicyHolderLastName)->toBe('Doe')
        ->and($insurance->insurancePolicyHolderSex)->toBe('M')
        ->and($insurance->insurancePolicyHolderState)->toBe('TX')
        ->and($insurance->insurancePolicyHolderZip)->toBe('75001')
        ->and($insurance->insuredAddress)->toBe('3 Covered Person Dr')
        ->and($insurance->insuredCity)->toBe('Houston')
        ->and($insurance->insuredCountryCode)->toBe('US')
        ->and($insurance->insuredCountryIso3166)->toBe('USA')
        ->and($insurance->insuredDob)->toBe('1980-01-02')
        ->and($insurance->insuredEntityTypeId)->toBe(2)
        ->and($insurance->insuredFirstName)->toBe('Jane')
        ->and($insurance->insuredLastName)->toBe('Doe')
        ->and($insurance->insuredSex)->toBe('F')
        ->and($insurance->insuredState)->toBe('TX')
        ->and($insurance->insuredZip)->toBe('77001');
});
