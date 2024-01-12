<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\LanguagesReference;

use ChrisReedIO\AthenaSDK\Data\Practice\LanguageData;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * ListLanguages
 *
 * Retrieves a list acceptable languages and their abbreviations
 */
class ListLanguages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/languages';
    }

    public function __construct()
    {
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json())
            ->map(fn (array $language) => LanguageData::fromArray($language));
    }
}
