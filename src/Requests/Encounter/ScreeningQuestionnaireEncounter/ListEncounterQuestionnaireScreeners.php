<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ScreeningQuestionnaireEncounter;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterQuestionnaireScreeners
 *
 * Retrieve a list of enabled questionnaire screeners for the encounter
 */
class ListEncounterQuestionnaireScreeners extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/questionnairescreeners";
    }

    /**
     * @param int $encounterid encounterid
     */
    public function __construct(
        protected int $encounterid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
