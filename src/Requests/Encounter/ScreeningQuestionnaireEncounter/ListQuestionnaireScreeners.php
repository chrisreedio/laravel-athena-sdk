<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ScreeningQuestionnaireEncounter;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListQuestionnaireScreeners
 *
 * Retrieves a list of questionnaire screeners
 */
class ListQuestionnaireScreeners extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/questionnairescreeners';
    }

    public function __construct() {}

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
