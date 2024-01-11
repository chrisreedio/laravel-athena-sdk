<?php

namespace ChrisReedIO\AthenaSDK\Resources\Appointments;

use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn\AppointmentCancelCheckin;
use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn\AppointmentCompleteCheckin;
use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn\AppointmentStartCheckin;
use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn\GetAppointmentCheckinRequirements;
use ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\RequiredFieldsCheck\ListDepartmentCheckinRequiredFields;
use ChrisReedIO\AthenaSDK\Resource;
use Saloon\Http\Response;

class CheckInResource extends Resource
{
    public function fields(string $departmentId): array
    {
        return $this->connector->send(new ListDepartmentCheckinRequiredFields($departmentId))->dtoOrFail();
    }

    public function validate(string $appointmentId): Response
    {
        return $this->connector->send(new GetAppointmentCheckinRequirements($appointmentId));
    }

    public function start(string $appointmentId): Response
    {
        return $this->connector->send(new AppointmentStartCheckin($appointmentId));
    }

    public function complete(string $appointmentId): Response
    {
        return $this->connector->send(new AppointmentCompleteCheckin($appointmentId));
    }

    public function cancel(string $appointmentId): Response
    {
        return $this->connector->send(new AppointmentCancelCheckin($appointmentId));
    }
}
