<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeEncounterDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientEncounterDocument
 *
 * Retrieves a specific encounter document information
 */
class GetPatientEncounterDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/encounterdocument/{$this->encounterdocumentid}";
    }

    /**
     * @param  int  $encounterdocumentid encounterdocumentid
     * @param  int  $patientid patientid
     * @param  null|bool  $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
     */
    public function __construct(
        protected int $encounterdocumentid,
        protected int $patientid,
        protected ?bool $getentityinfo = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['getentityinfo' => $this->getentityinfo]);
    }
}
