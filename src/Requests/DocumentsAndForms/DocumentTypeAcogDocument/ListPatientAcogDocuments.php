<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAcogDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientAcogDocuments
 *
 * Retrieves the ACOG documents of a specific patient
 */
class ListPatientAcogDocuments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/acog";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|bool  $showdeleted By default, deleted documents are not listed.  Set to list these.
     * @param  null|string  $status The status of the task to filter document results.
     * @param  int  $departmentid The athenaNet department id.
     */
    public function __construct(
        protected int $patientid,
        protected ?bool $showdeleted,
        protected ?string $status,
        protected int $departmentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showdeleted' => $this->showdeleted, 'status' => $this->status, 'departmentid' => $this->departmentid]);
    }
}
