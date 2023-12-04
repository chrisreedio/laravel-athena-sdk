<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPrescriptionPage
 *
 * Retrieves a specific page from the specific prescription document of the patient
 */
class GetPrescriptionPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/prescription/{$this->prescriptionid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $pageid pageid
     * @param  int  $prescriptionid prescriptionid
     * @param  int  $patientid patientid
     * @param  null|string  $filesize The file size of the document being requested.
     */
    public function __construct(
        protected int $pageid,
        protected int $prescriptionid,
        protected int $patientid,
        protected ?string $filesize = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
