<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentCustomFields
 *
 * Modify the customfield data for a specific appointment
 */
class UpdateAppointmentCustomFields extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/customfields";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  array  $customfields  A JSON representation of any updates to custom fields. The contents of this should match the custom fields output with /appointments/customfields of course, any updates. Validation should happen based on the structure given in the /customfields/ call; this means that the values submitted in a select list should be a proper option ID, that number fields are restricted to numbers, and date fields restricted to dates (mm/dd/yyyy).
     */
    public function __construct(
        protected int $appointmentid,
        protected array $customfields,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['customfields' => $this->customfields]);
    }
}
