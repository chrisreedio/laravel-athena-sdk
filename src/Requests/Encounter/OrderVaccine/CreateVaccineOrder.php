<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderVaccine;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateVaccineOrder
 *
 * Create a new vaccine order record for a specific encounter
 */
class CreateVaccineOrder extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/orders/vaccine";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param int $diagnosissnomedcode The SNOMED code for diagnosis this order is for.
	 * @param int $ordertypeid The athena ID of the vaccine to order. Must be an orderable vaccine. Get the IDs using /reference/order/vaccine
	 * @param null|string $administernote An additional note to the provider or staff for administration.
	 * @param null|string $declineddate The date on which the patient declined the vaccine. Required if the declined reason is passed in.
	 * @param null|int $declinedreason To get a list of decline reasons for this input, call "GET /reference/order/vaccine/declinedreasons"
	 * @param null|bool $dispenseaswritten Whether the vaccine prescription should be marked as dispense as written (i.e., no substitutions without consulting the doctor).
	 * @param null|string $facilityid The athena id of the pharmacy you want to send the vaccine prescription to. Defaults to the patient default pharmacy. Get a localized list using /chart/configuration/facilities.
	 * @param null|string $ndc The National Drug Code for the vaccine.
	 * @param null|int $numrefillsallowed The number of refills allowed for this vaccine prescription. Defaults to 0.
	 * @param null|string $orderingmode Selects whether you wish to prescribe, administer, or decline this vaccine.
	 * @param null|string $performondate The date on which the Vaccine was administered.
	 * @param null|string $pharmacynote A note to send to the pharmacy.
	 * @param null|string $providernote An internal note for the provider or staff.
	 * @param null|string $unstructuredsig The unstructured sig.
	 */
	public function __construct(
		protected int $encounterid,
		protected int $diagnosissnomedcode,
		protected int $ordertypeid,
		protected ?string $administernote = null,
		protected ?string $declineddate = null,
		protected ?int $declinedreason = null,
		protected ?bool $dispenseaswritten = null,
		protected ?string $facilityid = null,
		protected ?string $ndc = null,
		protected ?int $numrefillsallowed = null,
		protected ?string $orderingmode = null,
		protected ?string $performondate = null,
		protected ?string $pharmacynote = null,
		protected ?string $providernote = null,
		protected ?string $unstructuredsig = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'diagnosissnomedcode' => $this->diagnosissnomedcode,
			'ordertypeid' => $this->ordertypeid,
			'administernote' => $this->administernote,
			'declineddate' => $this->declineddate,
			'declinedreason' => $this->declinedreason,
			'dispenseaswritten' => $this->dispenseaswritten,
			'facilityid' => $this->facilityid,
			'ndc' => $this->ndc,
			'numrefillsallowed' => $this->numrefillsallowed,
			'orderingmode' => $this->orderingmode,
			'performondate' => $this->performondate,
			'pharmacynote' => $this->pharmacynote,
			'providernote' => $this->providernote,
			'unstructuredsig' => $this->unstructuredsig,
		]);
	}
}
