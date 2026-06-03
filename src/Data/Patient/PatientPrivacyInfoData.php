<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class PatientPrivacyInfoData extends AthenaData
{
    public function __construct(
        public ?PatientSignatureData $patientSignature = null,
        public ?int $checkboxesConfigured = null,
        public ?InsuredSignatureData $insuredSignature = null,
        public ?PrivacyNoticeData $privacyNotice = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            patientSignature: isset($data['patientsignature']) && is_array($data['patientsignature'])
                ? PatientSignatureData::fromArray($data['patientsignature'])
                : null,
            checkboxesConfigured: isset($data['checkboxesconfigured']) ? (int) $data['checkboxesconfigured'] : null,
            insuredSignature: isset($data['insuredsignature']) && is_array($data['insuredsignature'])
                ? InsuredSignatureData::fromArray($data['insuredsignature'])
                : null,
            privacyNotice: isset($data['privacynotice']) && is_array($data['privacynotice'])
                ? PrivacyNoticeData::fromArray($data['privacynotice'])
                : null,
        );
    }
}
