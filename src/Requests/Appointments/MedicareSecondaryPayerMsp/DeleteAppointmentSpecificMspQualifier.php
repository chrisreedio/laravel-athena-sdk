<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\MedicareSecondaryPayerMsp;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteAppointmentSpecificMspQualifier
 *
 * Deletes the Medicare Secondary Payer qualifier of a given appointment.
 */
class DeleteAppointmentSpecificMspQualifier extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/mspq";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {}
}
