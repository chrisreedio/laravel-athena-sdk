<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentNotes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentNotes
 *
 * Retrieves note details for a specific appointment
 */
class ListAppointmentNotes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/notes";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  null|bool  $showdeleted  By default, we prevent deleted appointment notes from being returned via the API.   This flag allows you to show deleted notes in the set of results returned.
     */
    public function __construct(
        protected int $appointmentid,
        protected ?bool $showdeleted = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showdeleted' => $this->showdeleted]);
    }
}
