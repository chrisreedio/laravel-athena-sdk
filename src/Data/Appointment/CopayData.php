<?php

namespace ChrisReedIO\AthenaSDK\Data\Appointment;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class CopayData extends AthenaData
{
    public function __construct(
        public ?int $collectedForAppointment = null,
        public ?int $insuranceCopay = null,
        public ?int $collectedForOther = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new self(
            collectedForAppointment: $data['collectedforappointment'],
            insuranceCopay: $data['insurancecopay'],
            collectedForOther: $data['collectedforother'],
        );
    }
}
