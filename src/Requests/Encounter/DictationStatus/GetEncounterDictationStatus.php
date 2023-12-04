<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DictationStatus;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterDictationStatus
 *
 * Retrieves the current status on whether or not an encounter is waiting for more transcription
 * messages
 */
class GetEncounterDictationStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/dictationstatus";
    }

    /**
     * @param  int  $encounterid encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }
}
