<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientLabResultDocument
 *
 * Retrieves a specific lab result document information
 */
class GetPatientLabResultDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/labresult/{$this->labresultid}";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $labresultid labresultid
     * @param  null|bool  $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
     * @param  null|bool  $showtemplate If true, interpretation template added to the document is also returned.
     */
    public function __construct(
        protected int $patientid,
        protected int $labresultid,
        protected ?bool $getentityinfo = null,
        protected ?bool $showtemplate = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['getentityinfo' => $this->getentityinfo, 'showtemplate' => $this->showtemplate]);
    }
}
