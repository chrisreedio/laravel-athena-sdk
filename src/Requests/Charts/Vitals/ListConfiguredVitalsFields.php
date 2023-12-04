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
     * @param  null|string  $specialtyid Show only the vitals configured for this specialty
     * @param  null|bool  $showunconfigured Show all global vitals, even if they are not configured at this practice.
     */
    public function __construct(
        protected ?string $specialtyid = null,
        protected ?bool $showunconfigured = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['specialtyid' => $this->specialtyid, 'showunconfigured' => $this->showunconfigured]);
    }
}
