<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Medication;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientMedicationEntry
 *
 * Modifies the properties of a given medication. E.g. reason to stop having the medication, etc.
 */
class UpdatePatientMedicationEntry extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/medications/{$this->medicationentryid}";
	}


	/**
	 * @param string $medicationentryid medicationentryid
	 * @param int $patientid patientid
	 * @param int $departmentid The athenanet department ID
	 * @param null|bool $hidden Set whether the medication is hidden in the UI.
	 * @param null|string $stopdate Stop date for this medication
	 * @param null|string $startdate Start date for this medication
	 * @param null|string $stopreason The reason the medication was stopped. If set, it it recommended but not required that a stop date is also set.
	 * @param null|string $patientnote A patient-facing note
	 * @param null|string $providernote An internal note
	 * @param null|string $unstructuredsig Can only be used to update historical (entered, downloaded, etc) medications. Will override a structured sig if there is one.
	 */
	public function __construct(
		protected string $medicationentryid,
		protected int $patientid,
		protected int $departmentid,
		protected ?bool $hidden = null,
		protected ?string $stopdate = null,
		protected ?string $startdate = null,
		protected ?string $stopreason = null,
		protected ?string $patientnote = null,
		protected ?string $providernote = null,
		protected ?string $unstructuredsig = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'departmentid' => $this->departmentid,
			'hidden' => $this->hidden,
			'stopdate' => $this->stopdate,
			'startdate' => $this->startdate,
			'stopreason' => $this->stopreason,
			'patientnote' => $this->patientnote,
			'providernote' => $this->providernote,
			'unstructuredsig' => $this->unstructuredsig,
		]);
	}
}
