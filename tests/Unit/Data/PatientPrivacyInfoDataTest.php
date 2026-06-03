<?php

use ChrisReedIO\AthenaSDK\Data\Patient\PatientData;
use ChrisReedIO\AthenaSDK\Data\Patient\PatientPrivacyInfoData;

it('maps detailed privacy info from the patient payload', function () {
    $privacyInfo = PatientPrivacyInfoData::fromArray([
        'patientsignature' => [
            'patientsignatureeffectivedate' => '05/08/2025',
            'patientsignatureexpirationdate' => '05/08/2026',
            'ispatientsignatureonfile' => false,
        ],
        'checkboxesconfigured' => 1,
        'insuredsignature' => [
            'insuredsignatureeffectivedate' => '05/08/2025',
            'insuredsignatureexpirationdate' => '05/08/2026',
            'isinsuredsignatureonfile' => false,
        ],
        'privacynotice' => [
            'privacynoticegivendate' => '05/08/2025',
            'isprivacynoticeonfile' => true,
            'privacynoticenotgivennote' => 'Patient declined',
            'privacynoticenotgivenreason' => 'OTHER',
        ],
    ]);

    expect($privacyInfo->checkboxesConfigured)->toBe(1)
        ->and($privacyInfo->patientSignature?->effectiveDate)->toBe('05/08/2025')
        ->and($privacyInfo->patientSignature?->expirationDate)->toBe('05/08/2026')
        ->and($privacyInfo->patientSignature?->isOnFile)->toBeFalse()
        ->and($privacyInfo->insuredSignature?->effectiveDate)->toBe('05/08/2025')
        ->and($privacyInfo->insuredSignature?->expirationDate)->toBe('05/08/2026')
        ->and($privacyInfo->insuredSignature?->isOnFile)->toBeFalse()
        ->and($privacyInfo->privacyNotice?->givenDate)->toBe('05/08/2025')
        ->and($privacyInfo->privacyNotice?->isOnFile)->toBeTrue()
        ->and($privacyInfo->privacyNotice?->notGivenNote)->toBe('Patient declined')
        ->and($privacyInfo->privacyNotice?->notGivenReason)->toBe('OTHER');
});

it('maps detailed privacy info on patient data', function () {
    $patient = PatientData::fromArray([
        'patientid' => 123,
        'detailedprivacyinfo' => [
            'patientsignature' => [
                'patientsignatureeffectivedate' => '05/08/2025',
                'patientsignatureexpirationdate' => '05/08/2026',
                'ispatientsignatureonfile' => true,
            ],
            'checkboxesconfigured' => 1,
            'insuredsignature' => [
                'insuredsignatureeffectivedate' => '05/08/2025',
                'insuredsignatureexpirationdate' => '05/08/2026',
                'isinsuredsignatureonfile' => true,
            ],
            'privacynotice' => [
                'privacynoticegivendate' => '05/08/2025',
                'isprivacynoticeonfile' => true,
            ],
        ],
    ]);

    expect($patient->detailedPrivacyInfo?->checkboxesConfigured)->toBe(1)
        ->and($patient->detailedPrivacyInfo?->patientSignature?->isOnFile)->toBeTrue();
});
