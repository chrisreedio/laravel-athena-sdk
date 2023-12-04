<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentThirdPartyExternalData;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentThirdPartyExternalData
 *
 * Modifies the third party external data for a specific appointment
 */
class UpdateAppointmentThirdPartyExternalData extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/thirdpartyexternaldata";
    }

    /**
     * @param  int  $appointmentid appointmentid
     * @param  string  $externaldata The external data to be stored for this, up to 4000 characters
     */
    public function __construct(
        protected int $appointmentid,
        protected string $externaldata,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['externaldata' => $this->externaldata]);
    }
}
