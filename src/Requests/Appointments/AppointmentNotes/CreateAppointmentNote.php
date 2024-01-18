<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentNotes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateAppointmentNote
 *
 * Creates a note for a specific appointment
 */
class CreateAppointmentNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/notes";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  string  $notetext  The note text.
     * @param  null|bool  $displayonschedule  Add appointment note to homepage display (defaults to false)
     */
    public function __construct(
        protected int $appointmentid,
        protected string $notetext,
        protected ?bool $displayonschedule = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'notetext' => $this->notetext,
            'displayonschedule' => $this->displayonschedule,
        ]);
    }
}
