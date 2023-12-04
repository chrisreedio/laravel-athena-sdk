<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\PatientRiskContract;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteRiskContracts
 *
 * Deletes the record of patient risk contract for specific patients
 */
class DeleteRiskContracts extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/chart/riskcontracts';
    }

    /**
     * @param null|bool $allriskcontracts If true, deletes all patient risk contract associations
     * @param null|array $patients List of patients to delete risk contracts.
     * @param null|int $riskcontractid Risk Contract ID
     */
    public function __construct(
        protected ?bool  $allriskcontracts = null,
        protected ?array $patients = null,
        protected ?int   $riskcontractid = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'allriskcontracts' => $this->allriskcontracts,
            'patients' => $this->patients,
            'riskcontractid' => $this->riskcontractid,
        ]);
    }
}
