<?php

namespace ChrisReedIO\AthenaSDK\Requests\DataImports\ImportSpecifications;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetDownloadSpecificationStatus
 *
 * Retrieves the present status of the download specification request
 */
class GetDownloadSpecificationStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/import/downloadspecification/{$this->requestid}/status";
    }

    /**
     * @param  int  $requestid  requestid
     */
    public function __construct(
        protected int $requestid,
    ) {}
}
