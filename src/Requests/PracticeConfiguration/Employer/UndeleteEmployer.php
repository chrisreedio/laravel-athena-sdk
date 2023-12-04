<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\Employer;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UndeleteEmployer
 *
 * Re-active a deleted the record of a specified employer
 */
class UndeleteEmployer extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/employers/{$this->employerid}/undelete";
    }

    /**
     * @param int $employerid employerid
     */
    public function __construct(
        protected int $employerid,
    )
    {
    }
}
