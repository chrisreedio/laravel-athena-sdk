<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\ScreeningQuestionnaireChart;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientAdministeredQuestionnaireScreeners
 *
 * Retrieve a list of historical questionnaire screeners for a given patient
 */
class ListPatientAdministeredQuestionnaireScreeners extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/administeredquestionnairescreeners";
    }

    /**
     * @param  int  $departmentid The athenaNet department ID.
     * @param  int  $patientid patientid
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
