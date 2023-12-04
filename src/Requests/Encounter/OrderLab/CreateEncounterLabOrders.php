<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderLab;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterLabOrders
 *
 * Creates a new imaging order record for a specific encounter
 */
class CreateEncounterLabOrders extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/orders/lab";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param int $diagnosissnomedcode The SNOMED code for diagnosis this order is for.
	 * @param null|string $loinc The LOINC of the lab you wish to order. Either this or ordertypeid can be used, but not both.
	 * @param null|int $facilityid The athena ID of the lab you want to send the order to. Get a localized list using /chart/configuration/facilities.
	 * @param null|int $ordertypeid The athena ID of the lab to order. Get the IDs using /reference/order/lab. Either this or LOINC can be used, but not both.
	 * @param null|string $facilitynote A note to send to the lab.
	 * @param null|bool $highpriority If true, then the order should be sent STAT.
	 * @param null|string $providernote An internal note for the provider or staff.
	 * @param null|string $futuresubmitdate The date the order should be sent. Defaults to today.
	 */
	public function __construct(
		protected int $encounterid,
		protected int $diagnosissnomedcode,
		protected ?string $loinc = null,
		protected ?int $facilityid = null,
		protected ?int $ordertypeid = null,
		protected ?string $facilitynote = null,
		protected ?bool $highpriority = null,
		protected ?string $providernote = null,
		protected ?string $futuresubmitdate = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'diagnosissnomedcode' => $this->diagnosissnomedcode,
			'loinc' => $this->loinc,
			'facilityid' => $this->facilityid,
			'ordertypeid' => $this->ordertypeid,
			'facilitynote' => $this->facilitynote,
			'highpriority' => $this->highpriority,
			'providernote' => $this->providernote,
			'futuresubmitdate' => $this->futuresubmitdate,
		]);
	}
}
