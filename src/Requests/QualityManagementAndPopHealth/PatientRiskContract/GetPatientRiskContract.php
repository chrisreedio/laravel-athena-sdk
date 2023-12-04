<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\PatientRiskContract;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientRiskContract
 *
 * Retrieves the patient risk contract information
 */
class GetPatientRiskContract extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/riskcontract";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|bool  $allcharts If true, retrieve the record which indicates a risk contract is applied to all charts associated with the given patient.
     * @param  null|int  $departmentid Department ID
     */
    public function __construct(
        protected int $patientid,
        protected ?bool $allcharts = null,
        protected ?int $departmentid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'allcharts' => $this->allcharts,
            'departmentid' => $this->departmentid,
        ]);
    }
}
