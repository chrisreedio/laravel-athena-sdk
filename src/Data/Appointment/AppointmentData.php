<?php

namespace ChrisReedIO\AthenaSDK\Data\Appointment;

use ChrisReedIO\AthenaSDK\Data\Patient\InsuranceData;
use ChrisReedIO\AthenaSDK\Data\Patient\PatientData;

readonly class AppointmentData
{
    public function __construct(
        public ?string $athenaId = null,
        public ?string $patientId = null,
        public ?string $appointmentTypeId = null,
        public ?string $appointmentType = null,
        public ?int $copay = null,
        public ?string $appointmentStatus = null,
        public ?string $lastModifiedBy = null,
        public ?string $departmentId = null,
        public ?string $providerId = null,
        public ?string $templateAppointmentId = null,
        public ?string $scheduledDateTime = null,
        public ?int $hl7ProviderId = null,
        public ?string $scheduledBy = null,
        public ?string $patientAppointmentTypeName = null,
        public ?string $date = null,
        public ?bool $coordinatorEnterprise = null,
        public ?string $lastModified = null,
        public ?array $notes = null,
        public ?CopayData $appointmentCopay = null,
        public ?bool $chargeEntryNotRequired = null,
        public ?int $duration = null,
        public ?bool $urgent = null,
        public ?string $startTime = null,
        public ?string $templateAppointmentTypeId = null,
        public ?string $referringProviderId = null,
        public ?string $renderingProviderId = null,
        public ?int $supervisingProviderId = null,
        public ?string $confirmationId = null,
        public ?string $confirmationStatus = null,
        public ?string $encounterId = null,
        public ?string $encounterStatus = null,
        public ?PatientData $patient = null,
        // @var PatientData[]|null @insurance
        public ?array $insurances = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['appointmentid'] ?? null,
            patientId: $data['patientid'] ?? null,
            appointmentTypeId: $data['appointmenttypeid'] ?? null,
            appointmentType: $data['appointmenttype'] ?? null,
            copay: $data['copay'] ?? null,
            appointmentStatus: $data['appointmentstatus'] ?? null,
            lastModifiedBy: $data['lastmodifiedby'] ?? null,
            departmentId: $data['departmentid'] ?? null,
            providerId: $data['providerid'] ?? null,
            templateAppointmentId: $data['templateappointmentid'] ?? null,
            scheduledDateTime: $data['scheduleddatetime'] ?? null,
            hl7ProviderId: $data['hl7providerid'] ?? null,
            scheduledBy: $data['scheduledby'] ?? null,
            patientAppointmentTypeName: $data['patientappointmenttypename'] ?? null,
            date: $data['date'] ?? null,
            coordinatorEnterprise: $data['coordinatorenterprise'] ?? null,
            lastModified: $data['lastmodified'] ?? null,
            notes: $data['appointmentnotes'] ?? [],
            appointmentCopay: isset($data['appointmentcopay']) ? CopayData::fromArray($data['appointmentcopay']) : null,
            chargeEntryNotRequired: $data['chargeentrynotrequired'] ?? null,
            duration: $data['duration'] ?? null,
            urgent: $data['urgent'] ?? null,
            startTime: $data['starttime'] ?? null,
            templateAppointmentTypeId: $data['templateappointmenttypeid'] ?? null,
            referringProviderId: $data['referringproviderid'] ?? null,
            renderingProviderId: $data['renderingproviderid'] ?? null,
            supervisingProviderId: $data['supervisingproviderid'] ?? null,
            confirmationId: $data['appointmentconfirmationid'] ?? null,
            confirmationStatus: $data['appointmentconfirmationname'] ?? null,
            encounterId: $data['encounterid'] ?? null,
            encounterStatus: $data['encounterstatus'] ?? null,
            patient: isset($data['patient']) ? PatientData::fromArray($data['patient']) : null,
            insurances: isset($data['insurances']) ? array_map(fn (array $insurance) => InsuranceData::fromArray($insurance), $data['insurances']) : null,
        );
    }
}
