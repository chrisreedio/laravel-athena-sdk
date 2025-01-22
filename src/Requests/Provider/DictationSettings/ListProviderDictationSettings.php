<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\DictationSettings;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProviderDictationSettings
 *
 * Retrieves the dictation settings for the provider
 */
class ListProviderDictationSettings extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/providers/dictationsettings';
    }

    /**
     * @param  null|array  $providerid  If provided, this will filter the results to only included the given providers. Multiple IDs (either as a comma delimited list or multiple POSTed values) are allowed.
     */
    public function __construct(
        protected ?array $providerid = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['providerid' => $this->providerid]);
    }
}
