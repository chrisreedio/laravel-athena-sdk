<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\VitalsEncounters;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterVital
 *
 * Create a record of vital readings for a patient for a specific encounter
 */
class CreateEncounterVital extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/vitals";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  array  $vitals This is an array of arrays in JSON.  Each subarray contains a group of related readings, like systolic and diastolic blood pressure. They will be assigned the same readingID
     */
    public function __construct(
        protected int $encounterid,
        protected array $vitals,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['vitals' => $this->vitals]);
    }
}
