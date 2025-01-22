<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPrescription
 *
 * Retrieves a specific prescription document information for a specific patient
 */
class GetPatientPrescription extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/prescription/{$this->prescriptionid}";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  int  $prescriptionid  prescriptionid
     */
    public function __construct(
        protected int $patientid,
        protected int $prescriptionid,
    ) {}
}
