<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAcogDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientAcogDocument
 *
 * Retrieves a specific ACOG document of the patient
 */
class GetPatientAcogDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/acog/{$this->acogid}";
    }

    /**
     * @param int $acogid acogid
     * @param int $patientid patientid
     */
    public function __construct(
        protected int $acogid,
        protected int $patientid,
    )
    {
    }
}
