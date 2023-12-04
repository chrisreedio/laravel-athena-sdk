<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\CheckOut;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CompleteAppointmentCheckout
 *
 * Initiate and complete the check-out process for a given appointment.
 */
class CompleteAppointmentCheckout extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/checkout";
    }

    /**
     * @param int $appointmentid appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    )
    {
    }
}
