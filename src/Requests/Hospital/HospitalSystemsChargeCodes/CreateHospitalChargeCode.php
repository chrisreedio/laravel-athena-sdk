<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalSystemsChargeCodes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateHospitalChargeCode
 *
 * Creates a new charge code for a hospital visit
 */
class CreateHospitalChargeCode extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/chargecodes";
	}


	/**
	 * @param string $chargecode The chargecode to create.
	 * @param int $departmentid The department id to associate this chargecode with.
	 * @param string $description The description of what the chargecode specifies.
	 * @param string $effectivedate The date that this chargecode becomes valid. Formatted as MM/DD/YYYY.
	 * @param string $revenuecode The revenue code associated with this chargecode.
	 * @param null|bool $dynamicpricing Is Price set at charge entry.
	 * @param null|string $expirationdate Date that this chargecode expires. Formatted as MM/DD/YYYY.
	 * @param null|bool $fractionalbilling True if the chargecode can be fractionally billed.
	 * @param null|number $minprice The minimum price for fractional billing.
	 * @param null|number $price The amount charged for what this chargecode specifies.
	 * @param null|string $procedurecode The procedure code associated with this chargecode.
	 * @param null|bool $softcode Is hcpcs entered at charge entry.
	 * @param null|string $username The username to add as.
	 */
	public function __construct(
		protected string $chargecode,
		protected int $departmentid,
		protected string $description,
		protected string $effectivedate,
		protected string $revenuecode,
		protected ?bool $dynamicpricing = null,
		protected ?string $expirationdate = null,
		protected ?bool $fractionalbilling = null,
		protected ?\number $minprice = null,
		protected ?\number $price = null,
		protected ?string $procedurecode = null,
		protected ?bool $softcode = null,
		protected ?string $username = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'chargecode' => $this->chargecode,
			'departmentid' => $this->departmentid,
			'description' => $this->description,
			'effectivedate' => $this->effectivedate,
			'revenuecode' => $this->revenuecode,
			'dynamicpricing' => $this->dynamicpricing,
			'expirationdate' => $this->expirationdate,
			'fractionalbilling' => $this->fractionalbilling,
			'minprice' => $this->minprice,
			'price' => $this->price,
			'procedurecode' => $this->procedurecode,
			'softcode' => $this->softcode,
			'username' => $this->username,
		]);
	}
}
