<?php

namespace ChrisReedIO\AthenaSDK\Resources\Appointments;

use ChrisReedIO\AthenaSDK\AthenaConnector;
use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentNotes\CreateAppointmentNote;
use ChrisReedIO\AthenaSDK\Resource;
use Saloon\Http\Response;

class AppointmentNotes extends Resource
{
    public function __construct(
        protected AthenaConnector $connector,
        protected int $appointmentId,
    ) {}

    public function create(
        string $note,
        ?bool $displayOnSchedule = null,
    ): Response {
        return $this->connector->send(new CreateAppointmentNote($this->appointmentId, $note, $displayOnSchedule));
    }
}
