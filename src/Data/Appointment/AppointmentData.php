<?php

namespace ChrisReedIO\AthenaSDK\Data\Appointment;

readonly class AppointmentData
{
    public function __construct(
        public string    $athenaId,
        public string    $patientId,
        public string    $appointmentTypeId,
        public string    $appointmentType,
        public int       $copay,
        public string    $appointmentStatus,
        public string    $lastModifiedBy,
        public string    $departmentId,
        public string    $providerId,
        public string    $templateAppointmentId,
        public string    $scheduledDateTime,
        public int       $hl7ProviderId,
        public string    $scheduledBy,
        public string    $patientAppointmentTypeName,
        public string    $date,
        public bool      $coordinatorEnterprise,
        public string    $lastModified,
        public array     $notes,
        public CopayData $appointmentCopay,
        public bool      $chargeEntryNotRequired,
        public int       $duration,
        public bool      $urgent,
        public string    $startTime,
        public string    $templateAppointmentTypeId,
        public ?string   $referringProviderId = null,
        public ?string   $renderingProviderId = null,
        public ?int      $supervisingProviderId = null
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['appointmentid'],
            patientId: $data['patientid'],
            appointmentTypeId: $data['appointmenttypeid'],
            appointmentType: $data['appointmenttype'],
            copay: $data['copay'],
            appointmentStatus: $data['appointmentstatus'],
            lastModifiedBy: $data['lastmodifiedby'],
            departmentId: $data['departmentid'],
            providerId: $data['providerid'],
            templateAppointmentId: $data['templateappointmentid'],
            scheduledDateTime: $data['scheduleddatetime'],
            hl7ProviderId: $data['hl7providerid'],
            scheduledBy: $data['scheduledby'],
            patientAppointmentTypeName: $data['patientappointmenttypename'],
            date: $data['date'],
            coordinatorEnterprise: $data['coordinatorenterprise'],
            lastModified: $data['lastmodified'],
            notes: $data['appointmentnotes'] ?? [],
            appointmentCopay: CopayData::fromArray($data['appointmentcopay']),
            chargeEntryNotRequired: $data['chargeentrynotrequired'],
            duration: $data['duration'],
            urgent: $data['urgent'],
            startTime: $data['starttime'],
            templateAppointmentTypeId: $data['templateappointmenttypeid'],
            referringProviderId: $data['referringproviderid'] ?? null,
            renderingProviderId: $data['renderingproviderid'] ?? null,
            supervisingProviderId: $data['supervisingproviderid'] ?? null
        );
    }
}
