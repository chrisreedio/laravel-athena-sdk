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
     * @param  int  $patientid patientid
     * @param  null|string  $email If not the patient (whose email should already be recorded), the email of the third party being invited.
     * @param  null|string  $lastname The last name of the third party being granted access.
     * @param  null|string  $firstname The first name of the third party being granted access.
     * @param  null|string  $homephone The home number of the third party being granted access. "declined" allowed.
     * @param  null|string  $mobilephone The mobile number of the third party being granted access. "declined" allowed.
     * @param  null|string  $permissionlevel If the access is for someone other than the patient, additional fields (first/last name, home/mobile phone, email) also become required. If not passed in, patient is assumed.
     * @param  null|bool  $patientinitiated Defaulting to true, is this action taken by the patient (instead of a practice user).
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected ?string $email = null,
        protected ?string $lastname = null,
        protected ?string $firstname = null,
        protected ?string $homephone = null,
        protected ?string $mobilephone = null,
        protected ?string $permissionlevel = null,
        protected ?bool $patientinitiated = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'email' => $this->email,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'homephone' => $this->homephone,
            'mobilephone' => $this->mobilephone,
            'permissionlevel' => $this->permissionlevel,
            'patientinitiated' => $this->patientinitiated,
        ]);
    }
}
