<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\VitalsEncounters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterVitals
 *
 * Retrieves a patient's vitals reading for a specific encounter
 */
class ListEncounterVitals extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/vitals";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  null|string  $enddate Only retrieve vitals that were taking on or before this date
     * @param  null|string  $startdate Only retrieve vitals that were taking on or after this date
     * @param  null|bool  $showemptyvitals Show configured vitals that have no readings for this patient.
     */
    public function __construct(
        protected int $encounterid,
        protected ?string $enddate = null,
        protected ?string $startdate = null,
        protected ?bool $showemptyvitals = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['enddate' => $this->enddate, 'startdate' => $this->startdate, 'showemptyvitals' => $this->showemptyvitals]);
    }
}
