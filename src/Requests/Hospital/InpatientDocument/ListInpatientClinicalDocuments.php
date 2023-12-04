<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\InpatientDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListInpatientClinicalDocuments
 *
 * BETA: Retrieves a list of clinical document information of a specific inpatient
 */
class ListInpatientClinicalDocuments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/inpatient/document/clinical';
    }

    /**
     * @param int $departmentid The department id associated with the document.
     * @param int $patientid THe patient's ID.
     * @param null|string $status Status of the document.
     * @param null|int $stayid The stay ID. If this field is used, the departmentid must also match one of the departments returned in GET /stays/{stayid}.
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected ?string $status = null,
        protected ?int    $stayid = null,
    )
    {
    }

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
