<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Problems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientProblems
 *
 * BETA: Modifies the section-note and noknownproblems fields for the patient problem
 */
class UpdatePatientProblems extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/problems";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The department ID.
	 * @param null|bool $replacenote If set, will replace the section note (removing existing data) instead of appending data. Use with caution.
	 * @param null|string $sectionnote The note to be attached to this problem. Will be appended to the existing note by default, unless replacenote is true.
	 * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
	 * @param null|string $thirdpartyusername User name of the patient in the third party application.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
		protected ?bool $replacenote = null,
		protected ?string $sectionnote = null,
		protected ?bool $patientfacingcall = null,
		protected ?string $thirdpartyusername = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'departmentid' => $this->departmentid,
			'replacenote' => $this->replacenote,
			'sectionnote' => $this->sectionnote,
			'PATIENTFACINGCALL' => $this->patientfacingcall,
			'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
		]);
	}
}
