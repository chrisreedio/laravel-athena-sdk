<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientInformationReleaseAuthorization;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientAuthorization
 *
 * Add a record of release authorization to a specific patient
 */
class CreatePatientAuthorization extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/authorizations";
    }

    /**
     * @param int $departmentid Department ID of the patient
     * @param string $effectivedate The starting date that the release authorization takes effect
     * @param int $patientid patientid
     * @param string $signeddate The date the release authorization release is signed
     * @param null|int $clientformid The client form ID that the release authorization is for
     * @param null|string $expirationdate The last date that the release authorization is valid
     * @param null|string $note Any additional notes for the release authorization
     * @param null|string $revokeddate The date the release authorization was revoked
     */
    public function __construct(
        protected int     $departmentid,
        protected string  $effectivedate,
        protected int     $patientid,
        protected string  $signeddate,
        protected ?int    $clientformid = null,
        protected ?string $expirationdate = null,
        protected ?string $note = null,
        protected ?string $revokeddate = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'effectivedate' => $this->effectivedate,
            'signeddate' => $this->signeddate,
            'clientformid' => $this->clientformid,
            'expirationdate' => $this->expirationdate,
            'note' => $this->note,
            'revokeddate' => $this->revokeddate,
        ]);
    }
}
