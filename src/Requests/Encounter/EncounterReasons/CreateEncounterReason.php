<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterReasons;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterReason
 *
 * Adds or updates an encounter reason in the specific encounter instance
 */
class CreateEncounterReason extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/encounterreasons";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  int  $encounterreasonid  Encounter reason ID. Must be from the list returned by /configuration/encounterreason
     * @param  null|string  $laterality  Optional laterality value (left or right)
     */
    public function __construct(
        protected int $encounterid,
        protected int $encounterreasonid,
        protected ?string $laterality = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'encounterreasonid' => $this->encounterreasonid,
            'laterality' => $this->laterality,
        ]);
    }
}
