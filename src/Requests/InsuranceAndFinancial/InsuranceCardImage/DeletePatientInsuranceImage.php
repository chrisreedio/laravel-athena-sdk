<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\InsuranceCardImage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientInsuranceImage
 *
 * Delete the record of the patient's insurance card image
 */
class DeletePatientInsuranceImage extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}/image";
    }

    /**
     * @param int $insuranceid insuranceid
     * @param int $patientid patientid
     */
    public function __construct(
        protected int $insuranceid,
        protected int $patientid,
    )
    {
    }
}
