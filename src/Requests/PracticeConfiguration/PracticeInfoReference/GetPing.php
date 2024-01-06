<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\PracticeInfoReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPing
 *
 * No description
 */
class GetPing extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/ping';
    }

    public function __construct()
    {
    }
}
