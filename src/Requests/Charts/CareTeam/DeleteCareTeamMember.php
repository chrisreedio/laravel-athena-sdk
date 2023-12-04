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
     * @param  int  $patientid patientid
     * @param  int  $memberid The member ID of the care team.
     * @param  int  $departmentid The athenaNet department ID.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     */
    public function __construct(
        protected int $patientid,
        protected int $memberid,
        protected int $departmentid,
        protected ?string $thirdpartyusername = null,
        protected ?bool $patientfacingcall = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'memberid' => $this->memberid,
            'departmentid' => $this->departmentid,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
        ]);
    }
}
