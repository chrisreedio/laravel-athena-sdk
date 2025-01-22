<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\SlidingFeePlansReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSlidingFeePlans
 *
 * Retrieves a list of poverty-based and non-poverty-based sliding fee plans
 */
class ListSlidingFeePlans extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/slidingfeeplans';
    }

    public function __construct() {}

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
