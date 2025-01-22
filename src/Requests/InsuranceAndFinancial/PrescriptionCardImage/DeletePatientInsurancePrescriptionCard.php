<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PrescriptionCardImage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientInsurancePrescriptionCard
 *
 * Add a new refferal authorization.
 */
class DeletePatientInsurancePrescriptionCard extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/prescription/card";
    }

    /**
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $patientid,
    ) {}
}
