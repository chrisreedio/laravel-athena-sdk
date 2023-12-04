<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\AppointmentHealthHistoryFormDocuments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentHealthHistoryForms
 *
 * Retrieves a list of history forms for a specific appointment
 */
class ListAppointmentHealthHistoryForms extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/healthhistoryforms";
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
