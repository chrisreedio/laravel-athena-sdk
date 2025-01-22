<?php

namespace ChrisReedIO\AthenaSDK\Data\Appointment;

use ChrisReedIO\AthenaSDK\Data\AthenaData;
use ChrisReedIO\AthenaSDK\Data\Patient\PatientData;
use DateTime;
use Illuminate\Support\Carbon;

use function array_key_exists;

readonly class AppointmentData extends AthenaData
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
        public ?DateTime $scheduledDateTime = null,
        public ?int $hl7ProviderId = null,
        public ?string $scheduledBy = null,
        public ?string $patientAppointmentTypeName = null,
        public ?string $date = null,
        public ?bool $coordinatorEnterprise = null,
        public ?DateTime $lastModified = null,
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
        public ?DateTime $startCheckIn = null,
        public ?DateTime $checkInTime = null,
        public ?DateTime $startCheckOut = null,
        public ?DateTime $checkOutTime = null,
        public ?DateTime $cancelledAt = null,
        public ?string $patientLocationId = null,
        public ?string $rescheduledAppointmentId = null,
        public ?DateTime $stopExamTime = null,
        public ?DateTime $stopIntakeTime = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
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
            scheduledDateTime: array_key_exists('scheduleddatetime', $data) ? Carbon::parse($data['scheduleddatetime'])->toDateTime() : null,
            hl7ProviderId: $data['hl7providerid'] ?? null,
            scheduledBy: $data['scheduledby'] ?? null,
            patientAppointmentTypeName: $data['patientappointmenttypename'] ?? null,
            date: $data['date'] ?? null,
            coordinatorEnterprise: $data['coordinatorenterprise'] ?? null,
            lastModified: array_key_exists('lastmodified', $data) ? Carbon::parse($data['lastmodified'])->toDateTime() : null,
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
            insurances: $data['insurances'] ?? null,
            startCheckIn: array_key_exists('startcheckin', $data) ? Carbon::createFromFormat('m/d/Y H:i:s', $data['startcheckin'])->toDateTime() : null,
            checkInTime: array_key_exists('checkindatetime', $data) ? Carbon::createFromFormat('m/d/Y H:i:s', $data['checkindatetime'])->toDateTime() : null,
            startCheckOut: array_key_exists('startcheckoutdatetime', $data) ? Carbon::createFromFormat('m/d/Y H:i:s', $data['startcheckoutdatetime'])->toDateTime() : null,
            checkOutTime: array_key_exists('checkoutdatetime', $data) ? Carbon::createFromFormat('m/d/Y H:i:s', $data['checkoutdatetime'])->toDateTime() : null,
            cancelledAt: array_key_exists('cancelleddatetime', $data) ? Carbon::createFromFormat('m/d/Y H:i:s', $data['cancelleddatetime'])->toDateTime() : null,
            patientLocationId: $data['patientlocationid'] ?? null,
            rescheduledAppointmentId: $data['rescheduledappointmentid'] ?? null,
        );
    }
}
