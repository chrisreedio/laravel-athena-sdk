<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;
use DateTime;

readonly class ReferralAuthorizationData extends AthenaData
{
    public function __construct(
        public ?int $athenaId = null,
        public ?int $departmentId = null,
        public ?string $insuranceId = null,
        public array $appointmentIds = [],
        public ?DateTime $startDate = null,
        public ?DateTime $expirationDate = null,
        public ?string $referralAuthNumber = null,
        public ?bool $noReferralRequired = null,
        public ?bool $specifiesVisits = null,
        public ?int $visitsApproved = null,
        public ?int $visitsLeft = null,
        public ?string $note = null,
        public ?string $notesToProvider = null,
        public array $icd9DiagnosisCodes = [],
        public array $icd10DiagnosisCodes = [],
        public array $procedureCodes = [],
        public array $raw = [],
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            athenaId: isset($data['referralauthid']) ? (int) $data['referralauthid'] : null,
            departmentId: isset($data['departmentid']) ? (int) $data['departmentid'] : null,
            insuranceId: isset($data['insuranceid']) ? (string) $data['insuranceid'] : null,
            appointmentIds: array_values(array_map(
                static fn (mixed $id): int => (int) $id,
                array_filter($data['appointmentids'] ?? [], static fn (mixed $id): bool => $id !== null && $id !== '')
            )),
            startDate: isset($data['startdate']) ? new DateTime($data['startdate']) : null,
            expirationDate: isset($data['expirationdate']) ? new DateTime($data['expirationdate']) : null,
            referralAuthNumber: $data['referralauthnumber'] ?? null,
            noReferralRequired: self::toBool($data['noreferralrequired'] ?? null),
            specifiesVisits: self::toBool($data['specifiesvisits'] ?? ($data['visits'] ?? null)),
            visitsApproved: isset($data['visitsapproved']) ? (int) $data['visitsapproved'] : null,
            visitsLeft: isset($data['visitsleft']) ? (int) $data['visitsleft'] : null,
            note: $data['note'] ?? ($data['notes'] ?? null),
            notesToProvider: $data['notestoprovider'] ?? null,
            icd9DiagnosisCodes: array_values($data['icd9diagnosiscodes'] ?? []),
            icd10DiagnosisCodes: array_values($data['icd10diagnosiscodes'] ?? []),
            procedureCodes: array_values($data['procedurecodes'] ?? []),
            raw: $data,
        );
    }
}
