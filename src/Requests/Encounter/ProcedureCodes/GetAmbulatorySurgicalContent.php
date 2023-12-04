<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ProcedureCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAmbulatorySurgicalContent
 *
 * Retrieves surgical case content associated with the given clinical-note/procedure encounter id and
 * encounter location.
 */
class GetAmbulatorySurgicalContent extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/ambulatorysurgicalcontent";
    }

    /**
     * @param int $encounterid encounterid
     * @param string $location Location of the forms in an encounter workflow.
     */
    public function __construct(
        protected int    $encounterid,
        protected string $location,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['location' => $this->location]);
    }
}
