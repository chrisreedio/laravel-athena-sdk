<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\ScreeningQuestionnaireChart;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientAdministeredQuestionnaireScreeners
 *
 * Retrieve a list of historical questionnaire screeners for a given patient
 */
class ListPatientAdministeredQuestionnaireScreeners extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/administeredquestionnairescreeners";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The athenaNet department ID.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid]);
	}
}
