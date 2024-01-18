<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeMedicalRecord;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientMedicalRecord
 *
 * Deletes the record of a specified medical record document
 */
class DeletePatientMedicalRecord extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/medicalrecord/{$this->medicalrecordid}";
    }

    /**
     * @param  int  $medicalrecordid  medicalrecordid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $medicalrecordid,
        protected int $patientid,
    ) {
    }
}
