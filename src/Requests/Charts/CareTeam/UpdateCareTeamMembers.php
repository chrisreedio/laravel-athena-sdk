<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\CareTeam;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateCareTeamMembers
 *
 * Modify the details of the care team members for a given patient in a particular department
 */
class UpdateCareTeamMembers extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/careteam";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $clinicalproviderid The athenaNet clinical provider ID.
     * @param  int  $departmentid The athenaNet department ID.
     * @param  string  $recipientclassid The recipient class ID/code.
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     */
    public function __construct(
        protected int $patientid,
        protected int $clinicalproviderid,
        protected int $departmentid,
        protected string $recipientclassid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'clinicalproviderid' => $this->clinicalproviderid,
            'departmentid' => $this->departmentid,
            'recipientclassid' => $this->recipientclassid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
        ]);
    }
}
