<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObDeliveryInformation;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListObDeliverySites
 *
 * BETA: Retrieve a list of valid delivery sites for an OB Delivery
 */
class ListObDeliverySites extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/obdeliverysites';
    }

    public function __construct()
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
