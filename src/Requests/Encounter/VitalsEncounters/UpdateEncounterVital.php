<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\VitalsEncounters;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEncounterVital
 *
 * Modifies a patient's vitals reading for a specific encounter
 */
class UpdateEncounterVital extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/vitals/{$this->vitalid}";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  string  $value The reading value. See the configuration for the proper units.
     * @param  int  $vitalid vitalid
     */
    public function __construct(
        protected int $encounterid,
        protected string $value,
        protected int $vitalid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['value' => $this->value]);
    }
}
