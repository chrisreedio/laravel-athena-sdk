<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientStatement;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientStatementImage
 *
 * Retrieves a specific patient statement for a specific patient
 */
class GetPatientStatementImage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/patientstatementimage";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  int  $statementid  The patient statement ID.
     */
    public function __construct(
        protected int $patientid,
        protected int $statementid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['statementid' => $this->statementid]);
    }
}
