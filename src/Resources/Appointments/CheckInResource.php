<?php

namespace ChrisReedIO\AthenaSDK\Resources\Appointments;

use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn\CreateAppointmentCancelCheckin;
use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn\CreateAppointmentCheckin;
use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn\CreateAppointmentStartCheckin;
use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn\GetAppointmentCheckinRequirements;
use ChrisReedIO\AthenaSDK\Resource;
use Saloon\Http\Response;

class CheckInResource extends Resource
{
    public function validate(string $appointmentId): Response
    {
        return $this->connector->send(new GetAppointmentCheckinRequirements($appointmentId));
    }

    public function start(string $appointmentId): Response
    {
        return $this->connector->send(new CreateAppointmentStartCheckin($appointmentId));
    }

    public function complete(string $appointmentId): Response
    {
        return $this->connector->send(new CreateAppointmentCheckin($appointmentId));
    }

    public function cancel(string $appointmentId): Response
    {
        return $this->connector->send(new CreateAppointmentCancelCheckin($appointmentId));
    }
}
