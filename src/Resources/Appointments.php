<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Data\Appointment\AppointmentData;
use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\GetAppointmentDetails;
use ChrisReedIO\AthenaSDK\Resource;
use ChrisReedIO\AthenaSDK\Resources\Appointments\AppointmentStatus;
use ChrisReedIO\AthenaSDK\Resources\Appointments\AppointmentSubscriptions;
use ChrisReedIO\AthenaSDK\Resources\Appointments\Booked;
use ChrisReedIO\AthenaSDK\Resources\Appointments\CheckInResource;
use ChrisReedIO\AthenaSDK\Resources\Appointments\Types;

class Appointments extends Resource
{
    public function booked(): Booked
    {
        return new Booked($this->connector);
    }

    public function subscriptions(): AppointmentSubscriptions
    {
        return new AppointmentSubscriptions($this->connector);
    }

    public function types(): Types
    {
        return new Types($this->connector);
    }

    public function status(): AppointmentStatus
    {
        return new AppointmentStatus($this->connector);
    }

    public function checkin(): CheckInResource
    {
        return new CheckInResource($this->connector);
    }

    public function get(
        int $appointmentId,
        ?bool $includeClaim = null,
        ?bool $includeCopay = null,
        ?bool $includeInsurance = null,
        ?bool $includePatient = null,
    ): AppointmentData {
        return $this->connector->send(new GetAppointmentDetails($appointmentId))->dtoOrFail();
    }
}
