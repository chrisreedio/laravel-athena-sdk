<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentIdByHash
 *
 * Gets the appointment id tied to the confirmation hash
 */
class GetAppointmentIdByHash extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/getappointmentidbyhash/{$this->messagehash}";
    }

    /**
     * @param  string  $messagehash  messagehash
     */
    public function __construct(
        protected string $messagehash,
    ) {}
}
