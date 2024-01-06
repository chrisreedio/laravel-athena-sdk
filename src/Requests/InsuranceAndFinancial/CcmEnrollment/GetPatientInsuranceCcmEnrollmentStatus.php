<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\CcmEnrollment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientInsuranceCcmEnrollmentStatus
 *
 * Retrieves the Chronic Care Management enrollment status of a patient's specific insurance package
 */
class GetPatientInsuranceCcmEnrollmentStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}/ccmenrollmentstatus";
    }

    /**
     * @param  int  $departmentid The current department ID.
     * @param  int  $insuranceid insuranceid
     * @param  int  $patientid patientid
     */
    public function __construct(
        protected int $departmentid,
        protected int $insuranceid,
        protected int $patientid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
