<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientCaseDocument
 *
 * Retrieves information on a specific patient case document
 */
class GetPatientCaseDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/patientcase/{$this->patientcaseid}";
    }

    /**
     * @param int $patientcaseid patientcaseid
     * @param int $patientid patientid
     */
    public function __construct(
        protected int $patientcaseid,
        protected int $patientid,
    )
    {
    }
}
