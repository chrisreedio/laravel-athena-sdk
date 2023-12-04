<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientOriginalLabResultDocument
 *
 * Retrieves original lab result document of the patient. This is applicable when document source is
 * FAX or UPLOAD and originally faxed or uploaded file is not split into multiple documents. Please use
 * "Get page from patient's lab result document" endpoint to download documentpages when original
 * document is not available.
 */
class GetPatientOriginalLabResultDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/labresult/{$this->labresultid}/originaldocument";
    }

    /**
     * @param int $labresultid labresultid
     * @param int $patientid patientid
     */
    public function __construct(
        protected int $labresultid,
        protected int $patientid,
    )
    {
    }
}
