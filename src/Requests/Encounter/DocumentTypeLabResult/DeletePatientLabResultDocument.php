<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLabResult;

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
