<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\InpatientDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListInpatientAdminDocuments
 *
 * BETA: Retrieves a list of administrative document.
 */
class ListInpatientAdminDocuments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/inpatient/document/admin';
    }

    /**
     * @param  int  $departmentid  The department id associated with the document.
     * @param  int  $patientid  The patient ID.
     * @param  null|string  $status  Status of the document
     * @param  null|int  $stayid  The stay ID. If this field is used, the departmentid must also match one of the departments returned in GET /stays/{stayid}.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?string $status = null,
        protected ?int $stayid = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
            'status' => $this->status,
            'stayid' => $this->stayid,
        ]);
    }
}
