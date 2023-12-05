<?php

namespace ChrisReedIO\AthenaSDK\Data\Appointment;

readonly class AppointmentTypeData
{
    public function __construct(
        public string $athenaId,
        public string $code,
        public string $name,
        public int $duration,
        public string $friendlyName,
        public bool $patient, // Assuming 'patient' is a boolean, change type if necessary
        public bool $generic, // Assuming 'generic' is a boolean, change type if necessary
        public bool $templateOnly, // Assuming 'template_only' is a boolean, change type if necessary
        public bool $createsEncounter // Assuming 'creates_encounter' is a boolean, change type if necessary
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['appointmenttypeid'],
            code: $data['shortname'],
            name: $data['name'],
            duration: $data['duration'],
            friendlyName: $data['patientdisplayname'],
            patient: $data['patient'],
            generic: $data['generic'],
            templateOnly: $data['templatetypeonly'],
            createsEncounter: $data['createencounteroncheckin']
        );
    }
}
