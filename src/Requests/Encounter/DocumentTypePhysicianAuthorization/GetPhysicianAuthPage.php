<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePhysicianAuthorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPhysicianAuthPage
 *
 * Retrieves a specific page from the specific physician authorization document of the patient
 */
class GetPhysicianAuthPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/physicianauth/{$this->physicianauthid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $pageid pageid
     * @param  int  $physicianauthid physicianauthid
     * @param  int  $patientid patientid
     * @param  null|string  $filesize The file size of the document being requested.
     */
    public function __construct(
        protected int $pageid,
        protected int $physicianauthid,
        protected int $patientid,
        protected ?string $filesize = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
