<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeDurableMedicalEquipmentDme;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientDmeDocumentPage
 *
 * Retrieves a specific page of Durable Medical Equipment document of the patient
 */
class GetPatientDmeDocumentPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/dme/{$this->dmeid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $dmeid dmeid
     * @param  int  $pageid pageid
     * @param  int  $patientid patientid
     * @param  null|string  $filesize The file size of the document being requested.
     */
    public function __construct(
        protected int $dmeid,
        protected int $pageid,
        protected int $patientid,
        protected ?string $filesize = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
