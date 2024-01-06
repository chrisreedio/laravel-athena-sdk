<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ScreeningQuestionnaireEncounter;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListConfigurationQuestionnaireScreeners
 *
 * Retrieve a list of possible questionnaire screeners for a given appointment ID or encounter ID
 */
class ListConfigurationQuestionnaireScreeners extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/questionnairescreeners';
    }

    /**
     * @param  int  $departmentid The department ID.
     * @param  int  $patientid The patient ID.
     * @param  null|int  $appointmentid The appointment ID. It is used solely to determine the specialty ID to determine possible questionnaires. If an encounter ID is passed in, it will take priority over the appointment ID.
     * @param  null|int  $encounterid The encounter ID. It is used solely to determine the specialty ID to determine the possible questionnaires.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?int $appointmentid = null,
        protected ?int $encounterid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
            'appointmentid' => $this->appointmentid,
            'encounterid' => $this->encounterid,
        ]);
    }
}
