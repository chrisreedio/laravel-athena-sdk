<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\SecureMessages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CreateLabResultReadStatus
 *
 * updates the specified LabResult has been read by the patient or a family member on the patient
 * portal
 */
class CreateLabResultReadStatus extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/patientsecuremessage/marklabresultread/{$this->messagethreadid}";
    }

    /**
     * @param  int  $messagethreadid  messagethreadid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $messagethreadid,
        protected int $patientid,
    ) {}
}
