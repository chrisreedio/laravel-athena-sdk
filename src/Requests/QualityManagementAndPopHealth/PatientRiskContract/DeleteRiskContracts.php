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
		return "/chart/riskcontracts";
	}


	/**
	 * @param null|bool $allriskcontracts If true, deletes all patient risk contract associations
	 * @param null|int $riskcontractid Risk Contract ID
	 * @param null|array $patients List of patients to delete risk contracts.
	 */
	public function __construct(
		protected ?bool $allriskcontracts = null,
		protected ?int $riskcontractid = null,
		protected ?array $patients = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'allriskcontracts' => $this->allriskcontracts,
			'riskcontractid' => $this->riskcontractid,
			'patients' => $this->patients,
		]);
	}
}
