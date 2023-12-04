<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientOrderDocumentPage
 *
 * Retrieves a specific page from the specific order document of the patient
 */
class GetPatientOrderDocumentPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/order/{$this->orderid}/pages/{$this->pageid}";
    }

    /**
     * @param int $orderid orderid
     * @param int $pageid pageid
     * @param int $patientid patientid
     * @param null|string $filesize The file size of the document being requested.
     */
    public function __construct(
        protected int     $orderid,
        protected int     $pageid,
        protected int     $patientid,
        protected ?string $filesize = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
