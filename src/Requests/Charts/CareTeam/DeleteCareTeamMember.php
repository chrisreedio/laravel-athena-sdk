<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\CareTeam;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteCareTeamMember
 *
 * Remove care team member for a given patient in a particular department
 */
class DeleteCareTeamMember extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/careteam";
    }

    /**
     * @param  int  $departmentid The athenaNet department ID.
     * @param  int  $memberid The member ID of the care team.
     * @param  int  $patientid patientid
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     */
    public function __construct(
        protected int $departmentid,
        protected int $memberid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'memberid' => $this->memberid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
        ]);
    }
}
