<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\EthnicitiesReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEthnicities
 *
 * Retrieves a list of acceptable ethnicity abbreviations.
 */
class ListEthnicities extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/ethnicities';
    }

    public function __construct()
    {
    }
}
