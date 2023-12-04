<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\VitalsEncounters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteEncounterVital
 *
 * Deletes the record of a specific vitals reading of the patient for a specific encounter
 */
class DeleteEncounterVital extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/vitals/{$this->vitalid}";
    }

    /**
     * @param int $encounterid encounterid
     * @param int $vitalid vitalid
     */
    public function __construct(
        protected int $encounterid,
        protected int $vitalid,
    )
    {
    }
}
