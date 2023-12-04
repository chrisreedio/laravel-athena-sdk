<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentNotes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentNote
 *
 * Modifies the note details for a specific appointment
 */
class UpdateAppointmentNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/notes/{$this->noteid}";
    }

    /**
     * @param  int  $appointmentid appointmentid
     * @param  int  $noteid noteid
     * @param  string  $notetext The note text.
     * @param  null|bool  $displayonschedule Add appointment note to homepage display.
     */
    public function __construct(
        protected int $appointmentid,
        protected int $noteid,
        protected string $notetext,
        protected ?bool $displayonschedule = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['notetext' => $this->notetext, 'displayonschedule' => $this->displayonschedule]);
    }
}
