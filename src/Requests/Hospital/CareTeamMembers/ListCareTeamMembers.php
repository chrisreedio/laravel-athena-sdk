<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\CareTeamMembers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListCareTeamMembers
 *
 * Retrieve the current list of care team members for a patient based on the hospital stay
 */
class ListCareTeamMembers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/careteammembers";
    }

    /**
     * @param  int  $stayid  stayid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|bool  $showallstatuses  By default only returns careteam members with a status of "active". If set to true, both active and not active careteam members will be returned.
     */
    public function __construct(
        protected int $stayid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $showallstatuses = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'showallstatuses' => $this->showallstatuses,
        ]);
    }
}
