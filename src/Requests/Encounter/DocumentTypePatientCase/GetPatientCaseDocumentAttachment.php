<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientCaseDocumentAttachment
 *
 * Get file in stream format for patient case document
 */
class GetPatientCaseDocumentAttachment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/patientcase/attachment/{$this->patientcasefileid}";
    }

    /**
     * @param  int  $patientcasefileid  patientcasefileid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $patientcasefileid,
        protected int $patientid,
    ) {
    }
}
