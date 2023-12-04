<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientPortalAccess;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientPortalInvitation
 *
 * Resends the Portal Invitation or Lost Password email
 */
class CreatePatientPortalInvitation extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/portalinvitation";
    }

    /**
     * @param int $departmentid
     * @param int $patientid patientid
     * @param null|string $email If not the patient (whose email should already be recorded), the email of the third party being invited.
     * @param null|string $firstname The first name of the third party being granted access.
     * @param null|string $homephone The home number of the third party being granted access. "declined" allowed.
     * @param null|string $lastname The last name of the third party being granted access.
     * @param null|string $mobilephone The mobile number of the third party being granted access. "declined" allowed.
     * @param null|bool $patientinitiated Defaulting to true, is this action taken by the patient (instead of a practice user).
     * @param null|string $permissionlevel If the access is for someone other than the patient, additional fields (first/last name, home/mobile phone, email) also become required. If not passed in, patient is assumed.
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected ?string $email = null,
        protected ?string $firstname = null,
        protected ?string $homephone = null,
        protected ?string $lastname = null,
        protected ?string $mobilephone = null,
        protected ?bool   $patientinitiated = null,
        protected ?string $permissionlevel = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'homephone' => $this->homephone,
            'lastname' => $this->lastname,
            'mobilephone' => $this->mobilephone,
            'patientinitiated' => $this->patientinitiated,
            'permissionlevel' => $this->permissionlevel,
        ]);
    }
}
