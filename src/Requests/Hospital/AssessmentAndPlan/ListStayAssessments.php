<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\AssessmentAndPlan;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayAssessments
 *
 * Retrieves assessment and plan of treatment information for a patient from the admission H&P and
 * enhanced progress notes for a specific stay.
 */
class ListStayAssessments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/assessments";
    }

    /**
     * @param  int  $stayid stayid
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     */
    public function __construct(
        protected int $stayid,
        protected ?string $thirdpartyusername = null,
        protected ?bool $patientfacingcall = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['THIRDPARTYUSERNAME' => $this->thirdpartyusername, 'PATIENTFACINGCALL' => $this->patientfacingcall]);
    }
}