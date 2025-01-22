<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\CommunicatorBrand;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetCommunicatorBrand
 *
 * Retrieves information of a specific communicator brand
 */
class GetCommunicatorBrand extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/communicatorbrands/{$this->communicatorbrandid}";
    }

    /**
     * @param  int  $communicatorbrandid  communicatorbrandid
     */
    public function __construct(
        protected int $communicatorbrandid,
    ) {}
}
