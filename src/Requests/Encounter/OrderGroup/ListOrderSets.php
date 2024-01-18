<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderGroup;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderSets
 *
 * Retrieves the list of ordersets
 */
class ListOrderSets extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/configuration/ordersets';
    }

    /**
     * @param  null|string  $username  Username to find all available order sets for.  Will return all order sets configured for this user as well as order sets configured for all users.
     */
    public function __construct(
        protected ?string $username = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['username' => $this->username]);
    }
}
