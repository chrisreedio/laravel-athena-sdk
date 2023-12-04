<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeLabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientLabResultDocument
 *
 * Deletes the record of a specified lab result document
 */
class DeletePatientLabResultDocument extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/labresult/{$this->labresultid}";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $labresultid labresultid
     */
    public function __construct(
        protected int $patientid,
        protected int $labresultid,
    ) {
    }
}
