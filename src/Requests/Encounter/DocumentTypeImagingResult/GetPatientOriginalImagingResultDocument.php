<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeImagingResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientOriginalImagingResultDocument
 *
 * Retrieves original imaging result document of the patient. This is applicable when document source
 * is FAX or UPLOAD and originally faxed or uploaded file is not split into multiple documents. Please
 * use "Get page from patient's imaging result document" endpoint to download documentpages when
 * original document is not available.
 */
class GetPatientOriginalImagingResultDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/imagingresult/{$this->imagingresultid}/originaldocument";
    }

    /**
     * @param  int  $imagingresultid  imagingresultid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $imagingresultid,
        protected int $patientid,
    ) {}
}
