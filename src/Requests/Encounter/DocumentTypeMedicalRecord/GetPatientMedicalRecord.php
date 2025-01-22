<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeMedicalRecord;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientMedicalRecord
 *
 * Retrieves a specific medical record document information
 */
class GetPatientMedicalRecord extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/medicalrecord/{$this->medicalrecordid}";
    }

    /**
     * @param  int  $medicalrecordid  medicalrecordid
     * @param  int  $patientid  patientid
     * @param  null|bool  $getentityinfo  If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
     */
    public function __construct(
        protected int $medicalrecordid,
        protected int $patientid,
        protected ?bool $getentityinfo = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['getentityinfo' => $this->getentityinfo]);
    }
}
