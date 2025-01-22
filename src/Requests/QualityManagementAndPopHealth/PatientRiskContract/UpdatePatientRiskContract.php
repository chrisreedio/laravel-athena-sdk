<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\PatientRiskContract;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientRiskContract
 *
 * Modifies the risk contract status for specific a patient
 */
class UpdatePatientRiskContract extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/riskcontract";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  int  $riskcontractid  Risk Contract ID
     * @param  null|bool  $allcharts  If true, apply this update to all charts associated with the given patient.
     * @param  null|int  $departmentid  Department ID
     */
    public function __construct(
        protected int $patientid,
        protected int $riskcontractid,
        protected ?bool $allcharts = null,
        protected ?int $departmentid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'riskcontractid' => $this->riskcontractid,
            'allcharts' => $this->allcharts,
            'departmentid' => $this->departmentid,
        ]);
    }
}
