<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Encounter;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientEncounter
 *
 * Modifies the patient location and patient status for a specific encounter
 */
class UpdatePatientEncounter extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  null|int  $patientlocationid  The practice patient location id. You can get a list of valid values by department via GET /chart/configuration/patientlocations.
     * @param  null|int  $patientstatusid  The practice patient status id. You can get a list of valid values by department via GET /chart/configuration/patientstatuses.
     */
    public function __construct(
        protected int $encounterid,
        protected ?int $patientlocationid = null,
        protected ?int $patientstatusid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'patientlocationid' => $this->patientlocationid,
            'patientstatusid' => $this->patientstatusid,
        ]);
    }
}
