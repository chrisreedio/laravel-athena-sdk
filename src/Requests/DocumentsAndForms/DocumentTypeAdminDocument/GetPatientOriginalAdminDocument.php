<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAdminDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientOriginalAdminDocument
 *
 * Retrieves original admin document of the patient. This is applicable only when document source is
 * FAX or UPLOAD and originally faxed or uploaded file is not split into multiple documents. Please use
 * "Get page from patient's admin document" endpoint to download documentpages when original document
 * is not available.
 */
class GetPatientOriginalAdminDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/admin/{$this->adminid}/originaldocument";
    }

    /**
     * @param  int  $adminid  adminid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $adminid,
        protected int $patientid,
    ) {}
}
