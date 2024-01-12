<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\RacesReference;

use ChrisReedIO\AthenaSDK\Data\Practice\RaceData;
use ChrisReedIO\AthenaSDK\Traits\SimpleJsonResponse;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use function collect;

/**
 * ListRaces
 *
 * Retrieves the list of types of races configured in the system
 */
class ListRaces extends Request
{
    use SimpleJsonResponse;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/races';
    }

    public function __construct()
    {
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json())
            ->map(fn (array $race) => RaceData::fromArray($race));
    }
}
