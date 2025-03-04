<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientInformationReleaseAuthorization;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientAuthorization
 *
 * Modifies information of a specific release authorizations for a patient
 */
class UpdatePatientAuthorization extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/authorizations/{$this->releaseauthorizationid}";
    }

    /**
     * @param  int  $departmentid  Department ID of the patient
     * @param  int  $patientid  patientid
     * @param  int  $releaseauthorizationid  releaseauthorizationid
     * @param  null|int  $clientformid  The client form ID that the release authorization is for
     * @param  null|string  $effectivedate  The starting date that the release authorization takes effect
     * @param  null|string  $expirationdate  The last date that the release authorization is valid
     * @param  null|string  $note  Any additional notes for the release authorization
     * @param  null|string  $revokeddate  The date the release authorization was revoked
     * @param  null|string  $signeddate  The date the release authorization release is signed
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected int $releaseauthorizationid,
        protected ?int $clientformid = null,
        protected ?string $effectivedate = null,
        protected ?string $expirationdate = null,
        protected ?string $note = null,
        protected ?string $revokeddate = null,
        protected ?string $signeddate = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'clientformid' => $this->clientformid,
            'effectivedate' => $this->effectivedate,
            'expirationdate' => $this->expirationdate,
            'note' => $this->note,
            'revokeddate' => $this->revokeddate,
            'signeddate' => $this->signeddate,
        ]);
    }
}
