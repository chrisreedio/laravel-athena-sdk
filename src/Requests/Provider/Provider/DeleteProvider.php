<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\Provider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteProvider
 *
 * BETA: Deletes the record of the specified provider
 */
class DeleteProvider extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/providers/{$this->providerid}";
    }

    /**
     * @param  int  $providerid providerid
     */
    public function __construct(
        protected int $providerid,
    ) {
    }
}
