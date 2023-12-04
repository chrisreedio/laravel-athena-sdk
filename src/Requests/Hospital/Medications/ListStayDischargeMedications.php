<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Medications;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayDischargeMedications
 *
 * BETA: Retrieves pre-admission and post-discharge (as what has changed) medication details for a
 * stay.
 * Note: This API retrieves home medications and changes to home medications as relates to an
 * inpatient stay. They are divided into the groups PREADMISSION, STOP, START, and CONTINUE.
 */
class ListStayDischargeMedications extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/dischargemedications";
    }

    /**
     * @param int $stayid stayid
     * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param null|string $thirdpartyusername User name of the patient in the third party application.
     */
    public function __construct(
        protected int     $stayid,
        protected ?bool   $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername
        ]);
    }
}
