<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vitals;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListConfiguredVitalsFields
 *
 * The Vitals Reference feature allows the user to retrieve the list of vitals configured for a
 * practice.
 */
class ListConfiguredVitalsFields extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/vitals';
    }

    /**
     * @param null|bool $showunconfigured Show all global vitals, even if they are not configured at this practice.
     * @param null|string $specialtyid Show only the vitals configured for this specialty
     */
    public function __construct(
        protected ?bool $showunconfigured = null,
        protected ?string $specialtyid = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showunconfigured' => $this->showunconfigured,
            'specialtyid' => $this->specialtyid
        ]);
    }
}
