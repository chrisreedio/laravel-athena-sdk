<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\MobileCarriersReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListMobileCarriers
 *
 * Retrieves the list of mobile carriers used for "mobilecarrierid" in patient calls
 */
class ListMobileCarriers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/mobilecarriers';
    }

    public function __construct() {}
}
