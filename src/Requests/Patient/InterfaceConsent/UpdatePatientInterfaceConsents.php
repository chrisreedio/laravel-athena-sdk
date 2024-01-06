<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\InterfaceConsent;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientInterfaceConsents
 *
 * Modifies the existing patient's consent to share health data
 */
class UpdatePatientInterfaceConsents extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/interfaceconsents";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|array  $consents A JSON array of consents to be updated.
     * @param  null|int  $departmentid Department ID
     */
    public function __construct(
        protected int $patientid,
        protected ?array $consents = null,
        protected ?int $departmentid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'consents' => $this->consents,
            'departmentid' => $this->departmentid,
        ]);
    }
}
