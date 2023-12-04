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
     * @param  null|int  $appointmentid The appointment ID. It is used solely to determine the specialty ID to determine possible questionnaires. If an encounter ID is passed in, it will take priority over the appointment ID.
     * @param  int  $departmentid The department ID.
     * @param  int  $patientid The patient ID.
     * @param  null|int  $encounterid The encounter ID. It is used solely to determine the specialty ID to determine the possible questionnaires.
     */
    public function __construct(
        protected ?int $appointmentid,
        protected int $departmentid,
        protected int $patientid,
        protected ?int $encounterid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'appointmentid' => $this->appointmentid,
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
            'encounterid' => $this->encounterid,
        ]);
    }
}
