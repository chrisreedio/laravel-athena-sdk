<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\AppointmentHealthHistoryFormDocuments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentHealthHistoryForm
 *
 * Retrieves a specific Health history form for an appointment
 */
class GetAppointmentHealthHistoryForm extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/appointments/{$this->appointmentid}/healthhistoryforms/{$this->formid}";
	}


	/**
	 * @param int $formid formid
	 * @param int $appointmentid appointmentid
	 * @param null|bool $shownullanswers If true, unanswered questions in the medical history, surgical history, and vaccine sections return null. If false (default), they return 'N'.
	 */
	public function __construct(
		protected int $formid,
		protected int $appointmentid,
		protected ?bool $shownullanswers = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['shownullanswers' => $this->shownullanswers]);
	}
}
