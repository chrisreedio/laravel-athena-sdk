<?php

namespace ChrisReedIO\AthenaSDK\Data\Appointment;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class AppointmentTypeData extends AthenaData
{
    public function __construct(
        public ?string $athenaId = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?int $duration = null,
        public ?string $friendlyName = null,
        public ?bool $patient = null, // Assuming 'patient' is a boolean, change type if necessary
        public ?bool $generic = null, // Assuming 'generic' is a boolean, change type if necessary
        public ?bool $templateOnly = null, // Assuming 'template_only' is a boolean, change type if necessary
        public ?bool $createsEncounter = null // Assuming 'creates_encounter' is a boolean, change type if necessary
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new self(
            athenaId: $data['appointmenttypeid'],
            code: $data['shortname'],
            name: $data['name'],
            duration: $data['duration'],
            friendlyName: $data['patientdisplayname'],
            patient: self::toBool($data['patient']),
            generic: self::toBool($data['generic']),
            templateOnly: self::toBool($data['templatetypeonly']),
            createsEncounter: self::toBool(['createencounteroncheckin'])
        );
    }
}
