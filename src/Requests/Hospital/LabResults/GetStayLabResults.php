<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\LabResults;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetStayLabResults
 *
 * BETA: Retrieves lab result details for a hospital stay
 */
class GetStayLabResults extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/labresults";
    }

    /**
     * @param int $stayid stayid
     * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param null|string $thirdpartyusername User name of the patient in the third party application.
     * @param null|string $datefilter Filter lab orders not individual results within a specific time period. Prefix: eq - specific, le - inclusive less, lt - exclusive less, ge - inclusive greater, gt - exclusive greater, separate start and end date with space. Example: ge2015-06-1 le2015-06-22
     * @param null|bool $showabnormaldetails Include the translation of the abnormalflag into HL7 code standards.
     */
    public function __construct(
        protected int     $stayid,
        protected ?bool   $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $datefilter = null,
        protected ?bool   $showabnormaldetails = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'datefilter' => $this->datefilter,
            'showabnormaldetails' => $this->showabnormaldetails,
        ]);
    }
}
