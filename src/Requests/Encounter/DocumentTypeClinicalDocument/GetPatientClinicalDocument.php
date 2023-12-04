<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeClinicalDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientClinicalDocument
 *
 * Retrieves a specific clinical document information
 */
class GetPatientClinicalDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/clinicaldocument/{$this->clinicaldocumentid}";
    }

    /**
     * @param  int  $clinicaldocumentid clinicaldocumentid
     * @param  int  $patientid patientid
     * @param  null|bool  $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
     * @param  null|bool  $showccdaxml Default false. If set to true, will include CCDAXML string.
     */
    public function __construct(
        protected int $clinicaldocumentid,
        protected int $patientid,
        protected ?bool $getentityinfo = null,
        protected ?bool $showccdaxml = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'getentityinfo' => $this->getentityinfo,
            'showccdaxml' => $this->showccdaxml,
        ]);
    }
}
