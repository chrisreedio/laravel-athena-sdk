<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ProcedureCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetStageProcedureDocumentation
 *
 * Retrieves the Pre/Intra/Post procedure documentation associated with a specific encounter.
 */
class GetStageProcedureDocumentation extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/stageproceduredocumentation";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param string $stage Stage of the encounter workflow (PRE/INTRA/POST).
	 * @param null|bool $showhtml Procedure documentation is stored as HTML templates filled in by the practice.  By default, we strip out all HTML when returning the data back through the API.  However, there are times when preserving the HTML formatting may be useful. If SHOWHTML is set to true, the original HTML from the template is preserved when returning data back through the API.
	 */
	public function __construct(
		protected int $encounterid,
		protected string $stage,
		protected ?bool $showhtml = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['stage' => $this->stage, 'showhtml' => $this->showhtml]);
	}
}
