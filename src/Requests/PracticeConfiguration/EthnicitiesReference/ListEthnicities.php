<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\EthnicitiesReference;

use ChrisReedIO\AthenaSDK\Data\Practice\EthnicityData;
use ChrisReedIO\AthenaSDK\Traits\SimpleJsonResponse;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

use function collect;

/**
 * ListEthnicities
 *
 * Retrieves a list of acceptable ethnicity abbreviations.
 */
class ListEthnicities extends Request
{
    use SimpleJsonResponse;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/ethnicities';
    }

    public function __construct() {}

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json())
            ->map(fn (array $ethnicity) => EthnicityData::fromArray($ethnicity));
    }
}
