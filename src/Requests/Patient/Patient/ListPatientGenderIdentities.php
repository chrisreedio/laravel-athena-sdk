<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\Patient;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientGenderIdentities
 *
 * BETA: Retrieves a list of gender identities configured for the practice
 */
class ListPatientGenderIdentities extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/configuration/patients/genderidentity";
	}


	/**
	 * @param null|bool $show2015edcehrtvalues If passed, will return the 2015 Ed. CEHRT values for describing gender identity for a patient that should be used with the genderidentity argument to POST /patients and PUT /patients/{patientid}. Otherwise, will return a list of strings that can be used with the genderidentity argument to POST /patients and PUT /patients/{patientid} for those clients that are using the 'Gender Identity/Sexual Orientation Workflows (Transgender Patient)' or 'Population Demographics - Social Determinant Fields (Sexual orientation/Gender identity)' setting in athenaNet.
	 */
	public function __construct(
		protected ?bool $show2015edcehrtvalues = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['show2015edcehrtvalues' => $this->show2015edcehrtvalues]);
	}
}
