<?php

use ChrisReedIO\AthenaSDK\Data\Patient\PatientData;
use ChrisReedIO\AthenaSDK\Data\Patient\PortalStatusData;

it('maps portal status from the patient payload', function () {
    $portalStatus = PortalStatusData::fromArray([
        'familyblockedfailedlogins' => false,
        'status' => 'REGISTERED',
        'familyregistered' => false,
        'lastlogindate' => '06/30/2025',
        'entitytodisplay' => 'PATIENT',
        'registered' => true,
        'lastloginentity' => 'PATIENT',
        'blockedfailedlogins' => false,
        'termsaccepted' => true,
        'noportal' => false,
    ]);

    expect($portalStatus->familyBlockedFailedLogins)->toBeFalse()
        ->and($portalStatus->status)->toBe('REGISTERED')
        ->and($portalStatus->familyRegistered)->toBeFalse()
        ->and($portalStatus->lastLoginDate)->toBe('06/30/2025')
        ->and($portalStatus->entityToDisplay)->toBe('PATIENT')
        ->and($portalStatus->registered)->toBeTrue()
        ->and($portalStatus->lastLoginEntity)->toBe('PATIENT')
        ->and($portalStatus->blockedFailedLogins)->toBeFalse()
        ->and($portalStatus->termsAccepted)->toBeTrue()
        ->and($portalStatus->noPortal)->toBeFalse();
});

it('maps portal status on patient data', function () {
    $patient = PatientData::fromArray([
        'patientid' => 123,
        'portalstatus' => [
            'status' => 'REGISTERED',
            'registered' => true,
        ],
    ]);

    expect($patient->portalStatus?->status)->toBe('REGISTERED')
        ->and($patient->portalStatus?->registered)->toBeTrue();
});
