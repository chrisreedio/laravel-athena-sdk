<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeLabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientInterpretationDocument
 *
 * Retrieves an interpretation document record of a specific patient
 */
class GetPatientInterpretationDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/interpretation";
    }

    /**
     * @param  int  $departmentid The athenaNet department id.
     * @param  int  $patientid patientid
     * @param  null|string  $documentsubclass The document subclass to filter document results.
     * @param  null|int  $encounterid Show only documents attached to this encounter.
     * @param  null|bool  $showdeleted By default, deleted documents are not listed.  Set to list these.
     * @param  null|string  $status The status of the task to filter document results.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?string $documentsubclass = null,
        protected ?int $encounterid = null,
        protected ?bool $showdeleted = null,
        protected ?string $status = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'documentsubclass' => $this->documentsubclass,
            'encounterid' => $this->encounterid,
            'showdeleted' => $this->showdeleted,
            'status' => $this->status,
        ]);
    }
}
