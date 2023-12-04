<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentHealthHistoryFormAppointments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentHealthHistoryForm
 *
 * Modifies a specific Health history form for an appointment
 */
class UpdateAppointmentHealthHistoryForm extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/healthhistoryforms/{$this->formid}";
    }

    /**
     * @param  int  $appointmentid appointmentid
     * @param  int  $formid formid
     * @param  string  $healthhistoryform JSON object containing the health history form to update. For the SOCIAL history section, questions with inputtype: "DROPDOWN" will have an array of "dropdownvalues" when retrieved with the given appointment GET endpoint. Each item in "dropdownvalues" is an array containing a key and a value together, representing a dropdown option. For the PUT endpoint, you should always save/return the key as the value is for display only. If entering a future date, it must be within the next year.
     */
    public function __construct(
        protected int $appointmentid,
        protected int $formid,
        protected string $healthhistoryform,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['healthhistoryform' => $this->healthhistoryform]);
    }
}
