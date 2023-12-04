<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\Forms;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientClientForms
 *
 * Retrieves a list of client forms
 */
class ListPatientClientForms extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/clientforms";
	}


	/**
	 * @param null|bool $hidepdfs Hides PDF forms if set
	 * @param int $departmentid The department id
	 */
	public function __construct(
		protected ?bool $hidepdfs = null,
		protected int $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['hidepdfs' => $this->hidepdfs, 'departmentid' => $this->departmentid]);
	}
}
