<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\CcmEnrollment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientInsuranceCcmEnrollmentStatus
 *
 * Modifies the Chronic Care Management enrollment status for a specific patient
 */
class UpdatePatientInsuranceCcmEnrollmentStatus extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}/ccmenrollmentstatus";
    }

    /**
     * @param  int  $departmentid  The current department ID.
     * @param  int  $insuranceid  insuranceid
     * @param  int  $patientid  patientid
     * @param  int  $status  The new status of CCM enrollment.
     * @param  null|string  $effectivedate  The effective date for the status. Only applicable for "Enrolled."
     * @param  null|string  $expirationdate  The expiration date for the status. Only applicable for "Enrolled."
     */
    public function __construct(
        protected int $departmentid,
        protected int $insuranceid,
        protected int $patientid,
        protected int $status,
        protected ?string $effectivedate = null,
        protected ?string $expirationdate = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'status' => $this->status,
            'effectivedate' => $this->effectivedate,
            'expirationdate' => $this->expirationdate,
        ]);
    }
}
