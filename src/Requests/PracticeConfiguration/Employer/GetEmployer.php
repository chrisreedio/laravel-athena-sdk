<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\Employer;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEmployer
 *
 * Retrieves information of a single employer detail
 */
class GetEmployer extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/employers/{$this->employerid}";
    }

    /**
     * @param  int  $employerid  employerid
     */
    public function __construct(
        protected int $employerid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
