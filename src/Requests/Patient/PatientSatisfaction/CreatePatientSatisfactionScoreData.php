<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientSatisfaction;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientSatisfactionScoreData
 *
 * Add the patient-satisfaction score for a specific provider in the system
 */
class CreatePatientSatisfactionScoreData extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/patientsatisfaction/results';
    }

    /**
     * @param string $enddate This should be the last day of the reporting period that we are working with. For instance if you are submitting report data for the month of october, you would send a date such as '10/31/2015'.
     * @param string $providerdata JSON object that is an array of objects containing "providerid", "departmentid", "score", and "datapointcount" which is the number of surveys thatmake up our average score.
     * @param string $startdate This should be the last day of the reporting period that we are working with. For instance if you are submitting report data for the month of october, you would send a date such as '10/31/2015'.
     * @param null|string $averagescore This is the average score that we should be comparing our providers to. It should be a number between 0 and 999.99
     */
    public function __construct(
        protected string  $enddate,
        protected string  $providerdata,
        protected string  $startdate,
        protected ?string $averagescore = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'enddate' => $this->enddate,
            'providerdata' => $this->providerdata,
            'startdate' => $this->startdate,
            'averagescore' => $this->averagescore,
        ]);
    }
}
