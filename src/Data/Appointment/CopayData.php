<?php

namespace ChrisReedIO\AthenaSDK\Data\Appointment;

readonly class CopayData
{
    public function __construct(
        public int $collectedForAppointment,
        public int $insuranceCopay,
        public int $collectedForOther,
    ) { }

    public static function fromArray(array $data): self
    {
        return new self(
            collectedForAppointment: $data['collectedforappointment'],
            insuranceCopay: $data['insurancecopay'],
            collectedForOther: $data['collectedforother'],
        );
    }
}
