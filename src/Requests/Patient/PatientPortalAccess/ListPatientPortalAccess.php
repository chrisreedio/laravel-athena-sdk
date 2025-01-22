<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientPortalAccess;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientPortalAccess
 *
 * Retrieve a list of portal users associated with a specific patient
 */
class ListPatientPortalAccess extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/portalaccess";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  null|int  $communicatorbrandid  The athenaNet Communicator brand ID
     */
    public function __construct(
        protected int $patientid,
        protected ?int $communicatorbrandid = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['communicatorbrandid' => $this->communicatorbrandid]);
    }
}
