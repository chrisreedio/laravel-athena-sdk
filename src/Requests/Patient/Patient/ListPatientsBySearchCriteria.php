<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\Patient;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientsBySearchCriteria
 *
 * Retrieves patients in a practice based on their partial name or full patient id Note: This endpoint
 * may rely on specific settings to be enabled in athenaNet Production to function properly that are
 * not required in other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListPatientsBySearchCriteria extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/search";
	}


	/**
	 * @param null|string $athenanetuser Username to check permissions against, required for restricted patients
	 * @param null|string $maxresults Maximum number of results to return (default 50)
	 * @param null|string $searchtype The search type to search by. The types can be retrieved in /configuration/patients/searchtypes
	 * @param string $searchterm The search term for finding patients, partial name or full patient id
	 * @param null|array $confidentialitycode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
	 */
	public function __construct(
		protected ?string $athenanetuser = null,
		protected ?string $maxresults = null,
		protected ?string $searchtype = null,
		protected string $searchterm,
		protected ?array $confidentialitycode = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'athenanetuser' => $this->athenanetuser,
			'maxresults' => $this->maxresults,
			'searchtype' => $this->searchtype,
			'searchterm' => $this->searchterm,
			'confidentialitycode' => $this->confidentialitycode,
		]);
	}
}
