<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Allergy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientAllergies
 *
 * Retrieves list of allergens, allergy reactions, severity documented in the patient chart
 */
class ListPatientAllergies extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/allergies";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|bool  $showinactive  Include deactivated allergies
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $showinactive = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'showinactive' => $this->showinactive,
        ]);
    }
}
