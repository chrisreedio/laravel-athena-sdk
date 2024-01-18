<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\Employer;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteEmployer
 *
 * Deletes the record of a specified employer
 */
class DeleteEmployer extends Request
{
    protected Method $method = Method::DELETE;

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
}
