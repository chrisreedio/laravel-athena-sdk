<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentInsurance;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentInsurances
 *
 * Retrieves all insurances of the patient for a specific appointment Note: This endpoint may rely on
 * specific settings to be enabled in athenaNet Production to function properly that are not required
 * in other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class GetAppointmentInsurances extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/insurances";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  null|bool  $ignorerestrictions  Set to true to allow ability to show the insurance information of appointments of patients with record restrictions and/or blocked status. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|bool  $showcancelled  If set, include cancelled and expired insurances.
     * @param  null|bool  $showfullssn  If set, will show full SSN instead of a masked number.
     */
    public function __construct(
        protected int $appointmentid,
        protected ?bool $ignorerestrictions = null,
        protected ?bool $showcancelled = null,
        protected ?bool $showfullssn = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'ignorerestrictions' => $this->ignorerestrictions,
            'showcancelled' => $this->showcancelled,
            'showfullssn' => $this->showfullssn,
        ]);
    }
}
