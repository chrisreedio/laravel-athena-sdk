<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderPrescription;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePrescriptionOrder
 *
 * Create new prescription order record for a specific encounter
 */
class CreatePrescriptionOrder extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/orders/prescription";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param int $diagnosissnomedcode The SNOMED code for diagnosis this order is for.
	 * @param null|string $ndc The NDC of the medication to order. You may use this instead of ordertypeid
	 * @param null|number $duration Sig field. The numerical amount of days to take this medication for.
	 * @param null|string $rxnormid The RxNormID of the medication to order. You may use this instead of ordertypeid. If the RxNormID maps to more than one possible orderable medication, it will be rejected.
	 * @param null|string $frequency Sig field. How often to take doses of the medication. Get the list of available values from /reference/order/prescription/frequencies.
	 * @param null|int $facilityid The athena ID of the pharmacy you want to send the prescription to. Defaults to the patient default pharmacy. You can use this or the pharmacy NCPDP ID but not both. Get a localized list using /chart/configuration/facilities.
	 * @param null|int $ordertypeid The athena ID of the medication to order. Must be an orderable medication. We currently do not support adding of compound or unlisted medicaitons. Get the IDs using /reference/order/prescription. You may use this, an NDC, or a RxNormID.
	 * @param null|string $externalnote An additional note to the patient.
	 * @param null|string $orderingmode Selects whether you wish to prescribe, administer, or dispense this medication.
	 * @param null|string $pharmacynote A note to send to the pharmacy.
	 * @param null|string $providernote An internal note for the provider or staff.
	 * @param null|string $administernote An additional note to the provider or staff for administration.
	 * @param null|number $dosagequantity Sig field. The numerical amount of medication to take.
	 * @param null|string $pharmacyncpdpid The NCPDP ID of the pharmacy you want to send the prescription to. You can use this instead of the facilityid, but not both.
	 * @param null|string $unstructuredsig The unstructured sig. If this field is set please leave all other sig fields blank.
	 * @param null|bool $dispenseaswritten Whether the prescription should be marked as dispense as written (i.e., no substitutions without consulting the doctor).
	 * @param null|int $numrefillsallowed The number of refills allowed for this prescription. Defaults to 0.
	 * @param null|string $dosagequantityunit Sig field. The unit of the dosage quantity, and required if that is passed in. Get the list of available values from /reference/order/prescription/dosagequantityunits. Most values are not valid for each individual medication.
	 * @param null|string $additionalinstructions Sig field. Additional modifiers for when to take the medication.
	 */
	public function __construct(
		protected int $encounterid,
		protected int $diagnosissnomedcode,
		protected ?string $ndc = null,
		protected ?\number $duration = null,
		protected ?string $rxnormid = null,
		protected ?string $frequency = null,
		protected ?int $facilityid = null,
		protected ?int $ordertypeid = null,
		protected ?string $externalnote = null,
		protected ?string $orderingmode = null,
		protected ?string $pharmacynote = null,
		protected ?string $providernote = null,
		protected ?string $administernote = null,
		protected ?\number $dosagequantity = null,
		protected ?string $pharmacyncpdpid = null,
		protected ?string $unstructuredsig = null,
		protected ?bool $dispenseaswritten = null,
		protected ?int $numrefillsallowed = null,
		protected ?string $dosagequantityunit = null,
		protected ?string $additionalinstructions = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'diagnosissnomedcode' => $this->diagnosissnomedcode,
			'ndc' => $this->ndc,
			'duration' => $this->duration,
			'rxnormid' => $this->rxnormid,
			'frequency' => $this->frequency,
			'facilityid' => $this->facilityid,
			'ordertypeid' => $this->ordertypeid,
			'externalnote' => $this->externalnote,
			'orderingmode' => $this->orderingmode,
			'pharmacynote' => $this->pharmacynote,
			'providernote' => $this->providernote,
			'administernote' => $this->administernote,
			'dosagequantity' => $this->dosagequantity,
			'pharmacyncpdpid' => $this->pharmacyncpdpid,
			'unstructuredsig' => $this->unstructuredsig,
			'dispenseaswritten' => $this->dispenseaswritten,
			'numrefillsallowed' => $this->numrefillsallowed,
			'dosagequantityunit' => $this->dosagequantityunit,
			'additionalinstructions' => $this->additionalinstructions,
		]);
	}
}
