<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class PortalStatusData extends AthenaData
{
    public function __construct(
        public ?bool $familyBlockedFailedLogins = null,
        public ?string $status = null,
        public ?bool $familyRegistered = null,
        public ?string $lastLoginDate = null,
        public ?string $entityToDisplay = null,
        public ?bool $registered = null,
        public ?string $lastLoginEntity = null,
        public ?bool $blockedFailedLogins = null,
        public ?bool $termsAccepted = null,
        public ?bool $noPortal = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            familyBlockedFailedLogins: self::toBool($data['familyblockedfailedlogins'] ?? null),
            status: $data['status'] ?? null,
            familyRegistered: self::toBool($data['familyregistered'] ?? null),
            lastLoginDate: $data['lastlogindate'] ?? null,
            entityToDisplay: $data['entitytodisplay'] ?? null,
            registered: self::toBool($data['registered'] ?? null),
            lastLoginEntity: $data['lastloginentity'] ?? null,
            blockedFailedLogins: self::toBool($data['blockedfailedlogins'] ?? null),
            termsAccepted: self::toBool($data['termsaccepted'] ?? null),
            noPortal: self::toBool($data['noportal'] ?? null),
        );
    }
}
