<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient;

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
        return '/patients/search';
    }

    /**
     * @param  string  $searchterm The search term for finding patients, partial name or full patient id
     * @param  null|string  $athenanetuser Username to check permissions against, required for restricted patients
     * @param  null|array  $confidentialitycode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|string  $maxresults Maximum number of results to return (default 50)
     * @param  null|string  $searchtype The search type to search by. The types can be retrieved in /configuration/patients/searchtypes
     */
    public function __construct(
        protected string $searchterm,
        protected ?string $athenanetuser = null,
        protected ?array $confidentialitycode = null,
        protected ?string $maxresults = null,
        protected ?string $searchtype = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'searchterm' => $this->searchterm,
            'athenanetuser' => $this->athenanetuser,
            'confidentialitycode' => $this->confidentialitycode,
            'maxresults' => $this->maxresults,
            'searchtype' => $this->searchtype,
        ]);
    }
}
