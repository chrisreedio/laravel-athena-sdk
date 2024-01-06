<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ReopenPatientCaseDocument
 *
 * Re-opens a specific patient case document which had been closed
 */
class ReopenPatientCaseDocument extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/patientcase/{$this->patientcaseid}/reopen";
    }

    /**
     * @param  int  $patientcaseid patientcaseid
     * @param  int  $patientid patientid
     */
    public function __construct(
        protected int $patientcaseid,
        protected int $patientid,
    ) {
    }
}
