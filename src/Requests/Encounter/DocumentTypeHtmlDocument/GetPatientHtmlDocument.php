<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeHtmlDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientHtmlDocument
 *
 * Retrieves a patient's hospital documents
 */
class GetPatientHtmlDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/html";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|bool  $showdeleted By default, deleted documents are not listed.  Set to list these.
     * @param  null|string  $status The status of the task to filter document results.
     * @param  int  $departmentid The athenaNet department id.
     * @param  null|int  $encounterid Show only documents attached to this encounter.
     * @param  null|string  $documentsubclass The document subclass to filter document results.
     */
    public function __construct(
        protected int $patientid,
        protected ?bool $showdeleted,
        protected ?string $status,
        protected int $departmentid,
        protected ?int $encounterid = null,
        protected ?string $documentsubclass = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showdeleted' => $this->showdeleted,
            'status' => $this->status,
            'departmentid' => $this->departmentid,
            'encounterid' => $this->encounterid,
            'documentsubclass' => $this->documentsubclass,
        ]);
    }
}