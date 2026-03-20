<?php

use ChrisReedIO\AthenaSDK\Data\Patient\ReferralAuthorizationData;

it('maps representative referral authorization payload fields into a dto', function () {
    $authorization = ReferralAuthorizationData::fromArray([
        'referralauthid' => '501',
        'departmentid' => '77',
        'insuranceid' => '12345',
        'appointmentids' => ['9001', '9002'],
        'startdate' => '2026-03-01',
        'expirationdate' => '2026-03-31',
        'referralauthnumber' => 'AUTH-123',
        'noreferralrequired' => 'false',
        'specifiesvisits' => 'true',
        'visitsapproved' => '6',
        'visitsleft' => '4',
        'note' => 'Needs PT authorization',
        'notestoprovider' => 'Review before next visit',
        'icd9diagnosiscodes' => ['719.46'],
        'icd10diagnosiscodes' => ['M25.561'],
        'procedurecodes' => ['97110'],
    ]);

    expect($authorization->athenaId)->toBe(501)
        ->and($authorization->departmentId)->toBe(77)
        ->and($authorization->insuranceId)->toBe('12345')
        ->and($authorization->appointmentIds)->toBe([9001, 9002])
        ->and($authorization->startDate?->format('Y-m-d'))->toBe('2026-03-01')
        ->and($authorization->expirationDate?->format('Y-m-d'))->toBe('2026-03-31')
        ->and($authorization->referralAuthNumber)->toBe('AUTH-123')
        ->and($authorization->noReferralRequired)->toBeFalse()
        ->and($authorization->specifiesVisits)->toBeTrue()
        ->and($authorization->visitsApproved)->toBe(6)
        ->and($authorization->visitsLeft)->toBe(4)
        ->and($authorization->note)->toBe('Needs PT authorization')
        ->and($authorization->notesToProvider)->toBe('Review before next visit')
        ->and($authorization->icd9DiagnosisCodes)->toBe(['719.46'])
        ->and($authorization->icd10DiagnosisCodes)->toBe(['M25.561'])
        ->and($authorization->procedureCodes)->toBe(['97110']);
});
