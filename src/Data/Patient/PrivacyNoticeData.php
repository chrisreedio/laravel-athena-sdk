<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class PrivacyNoticeData extends AthenaData
{
    public function __construct(
        public ?string $givenDate = null,
        public ?bool $isOnFile = null,
        public ?string $notGivenNote = null,
        public ?string $notGivenReason = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            givenDate: $data['privacynoticegivendate'] ?? null,
            isOnFile: self::toBool($data['isprivacynoticeonfile'] ?? null),
            notGivenNote: $data['privacynoticenotgivennote'] ?? null,
            notGivenReason: $data['privacynoticenotgivenreason'] ?? null,
        );
    }
}
