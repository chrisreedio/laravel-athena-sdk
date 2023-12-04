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
     * @param  int  $releaseauthorizationid releaseauthorizationid
     * @param  int  $patientid patientid
     * @param  int  $departmentid Department ID of the patient
     * @param  null|string  $note Any additional notes for the release authorization
     * @param  null|string  $signeddate The date the release authorization release is signed
     * @param  null|string  $revokeddate The date the release authorization was revoked
     * @param  null|int  $clientformid The client form ID that the release authorization is for
     * @param  null|string  $effectivedate The starting date that the release authorization takes effect
     * @param  null|string  $expirationdate The last date that the release authorization is valid
     */
    public function __construct(
        protected int $releaseauthorizationid,
        protected int $patientid,
        protected int $departmentid,
        protected ?string $note = null,
        protected ?string $signeddate = null,
        protected ?string $revokeddate = null,
        protected ?int $clientformid = null,
        protected ?string $effectivedate = null,
        protected ?string $expirationdate = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'note' => $this->note,
            'signeddate' => $this->signeddate,
            'revokeddate' => $this->revokeddate,
            'clientformid' => $this->clientformid,
            'effectivedate' => $this->effectivedate,
            'expirationdate' => $this->expirationdate,
        ]);
    }
}
