<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeAcogDocument;

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
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  null|bool  $showdeleted  By default, deleted documents are not listed.  Set to list these.
     * @param  null|string  $status  The status of the task to filter document results.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $showdeleted = null,
        protected ?string $status = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'showdeleted' => $this->showdeleted,
            'status' => $this->status,
        ]);
    }
}
