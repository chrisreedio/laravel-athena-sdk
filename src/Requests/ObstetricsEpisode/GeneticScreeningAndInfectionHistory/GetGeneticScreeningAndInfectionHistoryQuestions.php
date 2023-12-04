<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\GeneticScreeningAndInfectionHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetGeneticScreeningAndInfectionHistoryQuestions
 *
 * BETA: Retrieves a list of questions that can be used to update the Genetic Screening and Infection
 * History part of an OB Episode
 */
class GetGeneticScreeningAndInfectionHistoryQuestions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/obepisodes/geneticscreeningandinfectionhistory/questions';
    }

    public function __construct()
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
